# ATK4 G11n Proposal

## Elements of a comprehensive solution

A mature solution would offer:

1. Localised routing
1. Localised validation
1. Localised system messages
1. Localised text content
1. Localised assets
1. Localised time
1. Localised number, date, time and currency formatting.

Principles for a good implementation include:

1. **Clean separation of the View.** Many elements of Locale such as translations are essentially a View issue and have nothing to do with the business and data layers. Models and Business Controllers etc shouldn’t have to know anything about the locale.

1. **Minimal need for manual intervention.** Manually localising everything on a page is tedious and error-prone. So far as possible, View localisation of strings, numbers, dates etc should be automatic and work by configuration.

1. **Fallback.** It should be possible to configure multi-step fallback paths for a locale, so the system will look for the best-match string or asset. This makes it easy to add and remove fine-grained localisation without touching the code, but it's rarely offered. As an extreme example:

fr-CA -> fr-FR -> en-CA -> en-US

## Localised routing

For public-facing sites, it's important that every resource has its own unique address. This is one of the fundamental principles of the web, and essential for SEO. There are many ways of doing this, such as separate domains or subdomains for each locale. But in most cases the practical solution is to prepend the url with a locale slug:

http://mysite.com/en/foo

Although this is neither semantic nor the official RFC recommendation, it's the de facto standard and used by sites such as Microsoft and Oracle. We need to offer it.

And for simplicity, there's a case for using it everywhere G11n is used, even in the back office where it would be acceptable to simply flag the locale in the session using, say, an account's locale configuration setting. But why have 2 approaches to maintain, document & learn if 1 would work fine in all situations? Would there every be a situation where a locale slug woudn't be acceptable? I can't think of one offhand...

To implement slugs I suggest we standardise internally on ISO language-id/country-id pairs, such as en-US, fr-CA etc. The Intl library in PHP requires this for number, date and time localisation - simple language codes such as en or de aren't enough.

There are 2 obvious issues for the Core with implementing locale slugs:

1. Getting asset loading to work with extra info in the URL
1. Getting url building methods to work with extra info in the URL

There are also a number of additional features that are desirable:

1. **Slug aliases**: it would be nice to have the option to map pretty aliases to the full ids we're using internally, to keep the URLs clean. Examples: en -> en-GB, ca -> en-CA, fr -> fr-FR etc.
1. **Url translations**: for SEO and simply out of respect for other cultures it would be good to enable tranlations of the Page id in the URL. So page "cart" could be "basket" in the UK and "pannier" in France, for example.
1. **Configurable handling for missing locale slugs**. If the slug is missing, we should offer the option to:
1. Throw a 404 exception
1. Use a default locale (particularly useful when adding locales to a site that's been operating without locale slugs, so old links won't break). So /foo/bar would be served with the default locale, while /de-DE/foo/bar would be served with German German etc.
1. Redirect to the same page, but with a default locale slug added. So /foo/bar would be redirected to, say, /en-GB/foo/bar.

## Localised validation & system messages

Validation should offer localised messages automatically if localisation is active. The same for any system errors that might be shown to users.

## Localised text content

This is the tricky one! A good solutions will:

1. Offer a practical workflow for managing and translating large numbers of strings.
1. Require minimal developer intervention once configured
1. Load translation strings fast on production sites.

These days professional translators use sophisticated Translation Memory software and translation agencies use workflow software that integrates with these packages. There are free and Open Source options, so everyone uses this software if they've got any sense at all!

Many PHP G11n solutions I've seen assume that translators will work in some kind of primitive web interface, but this is totally impractical for projects of any scale. So the solution needs to offer:

1. An environment for users to author and store Message Catalogues in the primary language
1. A way to export and import Message Catalogues in a form that will work for freelance translators and translation agencies
1. A robust and flexible system of message keys
1. A way to process messages stored as Markdown, with pluggability for other markdown languages
1. A way to load Message Catalogues fast in production sites.

For production, I would suggest that caching a PHP array is the fastest and most reliable way to store a Message Catalogue.

But a PHP array is a pretty miserable way to edit messages, especially complex messages such as HTML, XML etc. It makes managing large message catalogues difficult, and is a poor and error-prone format for interchange with professional translators.

So I suggest a simple database interface where messages can be edited inline in a grid, with a popup text editor for working with longer strings. Authors would edit long texts outside the system and paste them in. Short texts, or small edits to longer texts could be done in the DB interface.

For interchange with translators there is an XML standard known as xliff which is universally acceptable. A very simple subset of xliff should meet our needs (see the Symfony Translation lib for an example). So we need a way to export from the DB to xliff and back, with other drivers pluggable in case someone ever has an exotic requirement.

Translation memory software will handle the diffs - to update a Message Catalogue, you simply send them the whole message catalogue and their software does the rest. So versioning would be good, but not essential. The diffs are stored in a standard format, so reputable translators will normally give you your diff if you want to move to a new contractor.

A controversial area is message keys. Perhaps becuase of PDO, PHP frameworks often use the original message as the key. This has always struck me as ugly - what happens if the message is edited? And how can you manage a large body of messages with a single-level classification scheme?

In my experience it's handy to have 3 levels of key:

catalogue_id -> message_group_id -> message_id

This allows for handy grouping and filtering in the editing grid without requiring a silly number of Message Catalogues. For example:

info->about_us->head_1
info->about_us->head_2
info->about_us->body
info->privacy->head_1
info->privacy->head_2
info->privacy->body
validation->numeric->greater_than
validation->numeric->less_than
validation->formats->email
validation->formats->credit_card_num

Hopefully you can start to see how this 3-level system makes things more manageable.

So the message table would look like this:

```
id (auto increment)
    catalogue_id (editable dropdown)
    message_group_id
    message_id
    processor_id (editable dropdown, default null) to flag that it's Markdown or some other form of markup
    blacklist (optional string) for a delimited list of locales where this string should be ignored for translation.
```

Then cols are added to hold the strings for each locale, with the base language first, en_GB, de_DE etc.

The interface would offer the option to export all strings in a Catalogue in xliff format, or the base langage paired with a target language. It would also offer upload and import of translated Catalogues.

There is a particular issue with very similar languages, such as GB and US English, or German and Swiss German. This is handled OK by translation software, but at times it would be easier just to put the options into a single string with some kind of markup, and have the system parse the string into each locale before caching it in the array for production. I did this in my old system like this: {{autumn|fall}}. I had a simple configuration which told the parser what to do. Not essential, but nice to have if you can think of a clean way to do it.

##Localised assets

Users may need to serve separate images, css files etc dependent on locale. Where an asset is localisable, there is a need to call a locale-aware url-builder that will search for the best match.

I've done this two ways. At first I created directory trees:

    /img/en_GB/products
    /img/en_US/products

This becomes a pain - it's hard to get an overview of what you have. So I switched to using a naming convention in a flat directory structure:

    /img/products/myproduct_en_GB.jpg
    /img/products/myproduct_en_US.jpg

    I found that this worked better, though it has its own drawbacks.

## Localised Time

The Locale object should allow loggers etc to get the current time in a locale. This is practical with the help of the PHP Intl library.

## Localised number, date, time and currency formatting

Again, this is quite simple using the Intl library. I have tested code. The issue here is ensuring that all relevant strings are localised without requiring a lot of manual work in the Page or View.

## Other Locale object services

+ It should be possible for the caller to temporarily change the active locale (for multi-lingual pages, for example), ensuring that it reverts to the default for future calls.
+ By default, the Locale object should configure itself using request locale slugs. But there are scenarios such as sign-in using user preferences where the app will need to set the locale directly.
