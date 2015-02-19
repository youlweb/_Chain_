![Chain](/img/logo.png)
###*\_Chain\_ is freedom.*  
\_Chain\_ is a library designed to optimize linear processing.
####Concept
Most modern applications follow a request/response pattern.
RESTful APIs are a good example of such practices.
\_Chain\_ aims at making such applications easy to code, test, debug, and maintain.

In \_Chain\_, each step of your program is a \_Link\_, a class with a single `EXE()` function, designed to accomplish a single task.

In the spirit of functional programming, the goal is to reuse as much code as possible, making the design of a new application as simple as chaining links together.

In true composite fashion, a \_Chain\_ is also a \_Link\_, which makes it easy to build intermediate components.

####The I_O visitor

To achieve this goal.