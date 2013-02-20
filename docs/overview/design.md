# Overview > Design Principles

## A Fresh Approach To Framework Design

New benefits require new approches. The patterns we use in Agile Toolkit are widely used in desktop frameworks, but may be unfamiliar to web developers.

You'll find the Toolkit easier to learn if you understand the five key principles that have driven its design:

* The Abstraction Principle
* The Composability Principle
* The Extensibility Principle
* The Testability Principle
* The Simplicity Principle

## The Abstraction Principle

We abstract all the technologies of the client-side and the server-side behind a consistent PHP interface. You lay out your data entry system, define UI behaviour and handle client-side events using PHP on the server.

![Web Development Levels of Abstraction](dia-levels-of-abstraction.png)

Years of experience with demanding Agile projects has proven that this radical level of abstraction shortens the learning curve, simplifies development and eases testing.

## The Composability Principle

The Toolkit is designed from the ground up to help developers compose View components from smaller sub-components. Powerful and flexible components speed development and increase reliability, and it's Composability that makes this possible.

Composability isn't restricted to View components &ndash; Models are composable too. So you can build complex business rules from simpler sub-components.

Techically, Composability requires components that are independent, keep track of their own state and know how to cooperate with each other. Much of the design of Agile Toolkit is focused on offering these features transparently to every View and Model component.

With Agile Toolkit you can quickly develop a range of flexible business and interface components to meet the repeating requirements of your problem domain.

## The Extensibility Principle

Composability is only the first step to a truly Agile web framework. In many ways the toughest challenge is adding functionality to your components as your application evolves.

This is where you need [Extensibility](http://en.wikipedia.org/wiki/Extensibility) &ndash; the ability to add new functionality without breaking existing tested code.

To achieve Composability our Model and View objects store their parameters and only render output at the last moment, once they know what other objects they're working with. So all their settings can be changed at any stage before they render. 

This means that when you extend an object any of its settings can be modified to provide different or additional functionality without breaking the existing, tested, parent object. The Extensibility features in Agile Toolkit add agility to your development process.

## The Testability Principle

Agile development relies on testing, and testability has been a key consideration in the Toolkit's design.

Our focus on Composability and Extensibility means that everything in the Toolkit is an object &ndash; there's no use of static classes. And every parameter in every object can be configured at runtime. So any component can be reconfigured or swapped out for testing with no special planning or setup.  

Agile Toolkit is a software tester's dream! 

## The Simplicity Principle

Finally, working with web frameworks you can sometimes feel that they're making simple things complex. With Agile Toolkit we strive to avoid this by always adopting the simplest practical approach, even if it's not the 'purest' or trendiest. For example:

* Configuration settings are plain old PHP hashes, so if you want complex conditional configurations just pop in some code.
* You won't need namespacing unless you're developing Addons or external libraries. This has never caused any practical problems and we avoid tedium like this:

    <pre>
    namespace Acme\TaskBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Acme\TaskBundle\Entity\Task;
    use Symfony\Component\HttpFoundation\Request;
    </pre>

* We use directories in the file system to define our routes without complex configuration conventions, just as HTTP intended.

You'll find this kind of pragmatic thinking throughout the codebase. It helps to keep the code lean and the learning curve manageable.
