![Chain](/img/logo.png)
###*\_Chain\_ is freedom.*
\_Chain\_ is a library designed to optimize linear processing.
####In a nutshell
\_Chain\_ originated from the observation that most modern applications follow a request/response pattern,
with RESTful APIs leading the way.  
\_Chain\_ aims at making such applications easy to code, test, debug, and maintain.

In the \_Chain\_ environment, each step of your program is a \_Link\_.
A \_Link\_ is a class with a single `EXE()` function, designed to accomplish a single task.

In the spirit of functional programming, the goal is to reuse as much code as possible,
hopefully making the design of a new application as simple as chaining links together.

In true composite fashion, a \_Chain\_ is also a \_Link\_, which makes it easy to build intermediate components.

####The I_O visitor
To achieve this goal, a \_Link\_'s `EXE()` method is set to receive an Input/Output, or `I_O` visitor,
and return it after applying a change to the data stored in its memory.

Think of the `I_O` object as a bag. Upon entering a \_Link\_,
the content of the `I_O` object is emptied inside the `EXE()` method.
The method transforms the content, and puts the resulting product in the bag.

The \_Chain_\ takes care of passing the `I_O` object from one \_Link\_ to the next,
unless a \_Link\_ wishes to break the \_Chain\_ by setting its `_X_()` method to return `TRUE`.

At the end of the \_Chain\_, the `I_O` visitor contains the final result.