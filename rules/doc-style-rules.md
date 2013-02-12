Documentation Style Rules
----

This doc will evolve ad-hoc as use-cases come up.

### General Rules

* Use US English
* Use informal English as much as possible: "it's", not 'it is' etc. But keep it professional - no slang.
* Be upbeat about the advantages of Agile Toolkit but not boastful or disrespectful of other frameworks
* Use the 80/20 rule - document the 20% of features that offer 80% of the functionality. Developers can find the rest of the functionality in the API docs.

### Headings

* For H1 & H2 use initial caps: **This Is An H1/H2 Example**
* For H3 use normal sentence capitalisation: **This is an H3 example**
* Use '&', not 'and'

### Naming

* Use 'Agile Toolkit' not 'ATK4' or 'The Agile Toolkit'
* Use 'Addon' not 'addon' or 'add-on'
* For the ATK classes, capitalise View, Page, Model & Controller
* Use 'method' for a function within a class (See PHP docs).
* Use 'property' for a class-scope variable
* Use 'variable' for a method-scope variable
* Use 'object-oriented', not 'Object-Oriented' or 'object oriented'
* Use 'JavaScript', not 'Javascript'

### Links

* To link to the API, use the markup: [api://DB_dsql]
* To create an anchor for linking inside an article, use the syntax: {#anchor_name}
* To cross-link within the docs, use standard Markdown link notation, with the path: /docs/section/article_name. We don't use any file extension.
* To link to images, place the image in the same directory as the article and use a relative link: <pre>![Alt String](dia_my_img.png)</pre>

### Code examples

* Indent code blocks 4 spaces or 1 tab, or use github-style triple-backticks.
* Quote inline code with github-style backticks: `null`, `my_func()` etc.
* For inline SQL keywords such as SELECT or DELETE, use block caps without backticks

### Comments

Use standard HTML comments: <!-- -->. We'll strip them out before publication. 

### Misc

* Booleans in the run of text: `null`, `true`, `false`, not `NULL`, null
* For quotes in the run of text, use 'single' not "double"
