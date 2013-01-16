Author: geoff
Date: xx.xx.xx
Tags: intro, patterns, 


# Why I'm choosing Agile Toolkit

## So what problems should a framework be solving?

I'm a part-time developer building quite complex ecommerce sites for my business. It's clearly time to ditch my own in-house framework (started in the days of PHP3!) for something more modern. But what are the problems I'm trying to solve with my choice of framework?

**First, architecture & layering**. Structuring web apps is hard - just look at all the endless debates on the forums. I'm looking for a framework with a development methodology that makes it clear what goes where and what does what. MVC is such a loosely defined pattern that with most frameworks you're basically having to work out a methodology for yourself. How do you implement controllers or models in Laravel or Symfony? You're going to be making a lot of choices and I've been wasting a lot of time researching architectural patterns. I'd rather that a more talented programmer showed me a way that was both structured and flexible so I can just get on with stuff.

**Second, AJAX & interactivity**. In this brave new world of AJAX, users have much higher usability expectations when interacting with data. Keeping the client and server in sync is becoming a significant challenge. Rolling your own client and somehow plugging it into a backend framework is too time-consuming and difficult to debug, even with the better JS frameworks. Handling HTML, CSS, JS & PHP and the interactions between them without an effective abstraction is a huge cognitive overhead, and you can end up with 30 buffers open in your editor to do relatively simple things.

**Third, reusability**. I need to plug together a number of similar but distinct sites with reusable but customizable components. This is another hard problem!

**Fourth, testability**. Can you isolate and test components without the administrative overhead of over-engineered IoC containers?

## How do the traditional frameworks score?

If this wish-list makes sense to you, how do the main players score?

Looking for an alternative, I've played with Symfony and Yii, and dug quite deeply into Laravel. I've also rejected a slew of others which seemed to offer little that was distinctive - there are a lot of me-too PHP frameworks out there...

It goes without saying that these communities are doing great work, and the leads on all these projects are brilliant developers. But it's striking how similar the projects are in their fundamental design and preconceptions. There seems to be a lack of ground-up rethinking of the purpose of a framework.

*Symfony 2*. Attracted by the professionalism of the project, my first false start was with Symfony. But I increasingly felt that it offers complex solutions to complex problems, and makes simple things difficult. I'm looking for simple solutions to complex problems, with simple things remaining easy. Architecture is rather open ended - the forums are full of debates on how to do stuff the "Symfony way". Testability is fantastic, but the complexity overhead is substantial. Reusability would require great skill. So though there is much to admire, the Symfony learning curve is too big, the cognitive overhead too high - certainly for small business projects. I suspect that this may apply to even quite large corporate projects - a major UK company recently abandoned Symfony because of the cost of getting developers up to speed. For me, a fail.

*Yii* makes an attempt to help with AJAX. But it is highly opinionated and built around a rather inflexible code generator. Great if the built-in functionality does what you need, but in my case it often didn't. I found I was fighting the framework to bend it to my requirements. And testability is not great, which probably explains why it appeals to hackers more than corporates. A fail for me, though if your needs are different it may be just fine.

*Laravel* is a moving target - the rate of innovation makes it difficult to keep up. The move to Laravel 4 is a big disruption, with a small core and Composer-managed components. Though it's a bit of an illusion, as many of the key components are quite interdependent. My early impression of L4 is that it will be a sort of Symfony Lite - it uses many of the Symfony libs and ideas, but Taylor has a talent for making things easier to understand and work with. So it has many of the same strengths and weakness as Symfony, but is much easier to learn.

So Laravel 4 and Symfony 2 are offering strong testability. But they are not really solving my issues with architecture, AJAX interactivity and reusability. So what else are these frameworks doing for me in return for climbing up their learning curve?

Well, they all make a bit of a meal of routing, which is a pretty trivial problem. Designing a generic router is challenging, I guess, but I know from experience that routing in any specific app can be achieved with a few lines of code in a front-controller. They offer some hooks for executing code at various stages of the request. Again, not a hard problem - I had this in my home-rolled framework. They offer an ORM - though you have to choose between something enormous and slow like Doctrine which needs a 700 page book to understand, or something easy but quite limited like Laravel Eloquent. They create complex Request objects which don't seem to add much value over $_SERVER, $_GET & $_POST but which require many visits to the API docs. They offer a bit of help with forms and validation, but it's usually either inflexible or limited. Some offer powerful templates with inheritance and what have you, but I find it's better to keep templates simple. And they offer some utility stuff which you can pick up anywhere.

As the sainted Rasmus famously points out, it's a lot of overhead for a pretty modest payoff. (I go back to the days when the community was so small you could chat with Rasmus online!), hence the No-Framework movement.

If they're not offering much they might as well be simple. So I had a brief flirtation with micro-frameworks.

*Symfony’s little sister Silex* seems the most popular, but it's a 13 meg download! Hardly "micro"... As soon as you dig in, you're lost in the arcane world of the Symfony libraries.

*Slim* is a very clean piece of work, doing just what it needs to do and keeping it simple. But there's no help at all with AJAX, and you are designing your own architectural approach pretty much from scratch. It was never intended for creating sophisticated data-driven AJAX apps.

So what to do? With deadlines looming it's been an increasingly anxious search.

## Agile Toolkit's radical approach offers unique benefits

Which brings me to Agile Toolkit. It's been designed from the ground up to offer customizable View components which plug nicely into your data and clip together to create sophisticated UI interactions. And with all the hard stuff done in server-side PHP. This is a very different focus from the traditional frameworks, and it uses a different design.

Here's the code that caught my interest:

    $crud=$p->add('CRUD');
    $crud->setModel(
        'Employee',
        array(
            'name','days_worked','salary'
        )
    );
    if($crud-grid){
        $crud-grid-addPaginator(5);
    }

Wow - now that really is something helpful! I'm getting a functional grid fully integrated with my back-end model and rules. I'm getting good-looking forms for create, read update and delete. I'm getting pagination, double-click protection and a slew of other goodies.

But am I locked into something inflexible? Turns out I can override almost anything quite trivially, even swapping in a different grid. I can add tabs and place my forms on them in a couple of lines. I can add master-detail in half a dozen lines. I can extend the CRUD for, say, a subset of the model dataset in another 2 or 3 lines. Quick search? Just 1 line. I can reorder the fields in my forms at runtime. I can... But you know all this anyway.

So lets go through my wish-list again:

*Architecture*: it's very clear what goes where. Pages, Views, Controllers and Models are clearly defined. Everyone in the community is working off the same hymn-sheet and I don't have to roll my own approach. Data access offers the flexibility of the DataMapper pattern with the simplicity of ActiveRecord - it really is a nice piece of work. And the template system offers coders an unusually frictionless workflow with designers. As implemented in Agile Tolkit, MVPC seems to make for much more clarity over standard MVC and greatly enhances reusability.

*Interactivity & AJAX*: hog-heaven. Nothing else I've found in the PHP world gives anything approaching this level of abstraction, integration, flexibility and reusability. For building backends, there's a yawning gulf between the relatively inflexible code-generators and hand-crafted AJAX apps such as Gmail. Agile Toolkit fills this gap brilliantly. As a user said on StackOverflow: *It accomplishes the goal of wrapping server-side and client-side into one comprehensive framework via PHP*.

*Reusability* is exceptional. Unlike the other frameworks, Models and Views have been specifically designed to work as extensible components that can plug together every which way without breaking. This is what I've been looking for.

*And finally, testability is great*, given that pretty much anything can be swapped out or reconfigured anywhere and at any stage, without the tedious admin involved with the more heavy-duty IoC containers.

## But what are the drawbacks of Agile Toolkit?

First, all this integration comes at a cost. Much of your code is going to be inextricably linked to the Agile Toolkit-ish way of doing things, and moving a large project to another framework would be a significant undertaking. So to enjoy the benefits you're taking a bet on the future of the Agile Toolkit community.

Is this a sensible gamble? Well, there's a small but stable company behind Agile Toolkit and the lead developers are highly committed to the project with ambitious plans going forward. So there are good reasons to be optimistic. And as the code-base is small it's relatively easy to add any new functionality you might need if you ever run into limitations. But you'll have to weigh up the benefits and risks in your own specific circumstances.

Second, the community is still small and the documentation immature. I've joined the project to help sort out the docs, and we're aiming to offer something state-of-the-art before too long. But the framework uses some unfamiliar ideas, so the learning curve is always going to be non-trivial. The small community is offset by the insane generosity of the developers in helping out newbies - the support they offer is truly exceptional. So if you're attracted by the Agile Toolkit approach, there's no reason why you can't get up to speed provided you invest the effort. And it's still going to be much easier than learning Symfony or Zend!

Finally, the mixed open-source/commercial licensing won't suit everyone, though if you do pay for a license you'll certainly get your money's worth in terms of backup from the developers.

## So who should move to Agile Toolkit?

To summarize, for me the decision is a no-brainer. Agile Toolkit often simplifies hard issues where other frameworks seem to overcomplicate simple issues. What's not to like?

If you're developing applications where your users will be interacting with data in non-trivial ways, you will be hard-pushed to find a better option.

So many thanks to authors and the community for all their hard work. With Agile Toolkit they have created something innovative that solves the hard problems of data-centric web development in new and effective ways.
