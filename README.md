![Chain](/img/logo.png)
###*\_Chain\_ is freedom.*
\_Chain\_ is a library designed to optimize linear processing.
####In a nutshell
\_Chain\_ originated from the observation that most modern applications follow a linear request/response pattern,
with RESTful APIs leading the way.  
\_Chain\_ aims at making such applications easy to code, test, debug, and maintain.

In the \_Chain\_ environment, each step of a program is a \_Link\_.
A \_Link\_ is a class with a single `EXE()` function, designed to accomplish a single task.

In the spirit of functional programming, the goal is to reuse as much code as possible,
hopefully making the design of a new application as simple as chaining links together.

In true composite fashion, a \_Chain\_ is also a \_Link\_, which makes it easy to build intermediate components.

####The I_O visitor
![Schema](/img/schema.png)  
*The `I_O` visitor acts like a signal running through the \_Chain\_.*

To achieve this goal, a \_Link\_'s `EXE()` method is set to receive an Input/Output visitor, or `I_O` visitor,
and return it after applying a change to the data stored in its memory.

Think of the `I_O` object as a bag. Upon entering a \_Link\_,
the content of the `I_O` object is emptied inside the `EXE()` method.
The method uses these ingredients, and puts the resulting product in the bag.

The \_Chain\_ takes care of passing the `I_O` object from one \_Link\_ to the next,
unless a \_Link\_ wishes to break the \_Chain\_ by setting its `_X_()` method to return `TRUE`.

At the end of the \_Chain\_, the `I_O` visitor contains the final result.

####Example
Let's create a simple \_Chain\_ destined to format a string.

#####Install
```shell
$ composer require chain/core
```
#####Import the string library
```shell
$ composer require chain/string
```

*Of course, installing `chain/string` directly would have imported `chain/core` automatically.
The extra step was added for clarity.*

#####Create an I_O object
```php
// This example assumes we're in the _Chain_ namespace for clarity.
$IO = new IO('   tHis   sTRinG    IS   a meSS!    ');
```
#####Create the \_Chain\_
```php
$chain = new Chain();
$chain->ADD(new String\_Whitespace_())
      ->ADD(new String\_Lowercase_());
```
#####Excecute
```php
$chain->EXE($IO);
```
#####Result
```php
$result = $IO->I_(Type::STRING); // $result = 'this string is a mess!'
```
####Dependency injection
Evidently, \_Chain\_ is better served in a dependency injection context, within Symfony for instance.

Complex services can be created with a \_Chain\_ made of basic \_Links\_, and injected in your controllers, or classes.

In the future, we may build an entire framework with \_Chain\_,
but we're going to need a much larger \_Link\_ library to achieve this goal.
####Inside a \_Link\_
Here's an example `EXE()` method inside a \_Link\_:
```php
// Division
public function EXE(I_O $IO){
    $numerator = $IO->I_(Type::NUMBER);
    $denominator = $IO->I_(Type::NUMBER);
    return $IO->_O($numerator/$denominator);
}
```
#####Input
Input variables are retrieved using the method `I_($type, $optional=false)`.
Each time the method is called, the next variable is retrieved.

The variables requested from the `I_O` visitor must be in the right order, and of the right type.
Requesting a variable that doesn't exist, or that is of the wrong type, triggers an exception.

For this reason, the `I_O` visitor is not iterable.
A valid type constant or class FQCN must be provided with each `I_()` call.

A second boolean argument can be provided when calling `I_()` to indicate that the requested `I_O` variable is optional.

This design effectively enforces type safety, palliating one of PHP's most criticized shortcoming.

However, in a production environment, where a \_Chain\_ has been properly tested,
the internal type checking can be bypassed for a performance uptick:
```php
$IO = new IO('foo');
$IO->prod(true);
```

All valid type constants are listed in the [static type class](/src/Type.php).

An I/O contract should be included in the PHP doc of every \_Link\_'s `EXE()` method:
```php
/**
 * Method action.
 *
 * Description.
 *
 * I/O contract
 * ------------
 * <pre>
 * I    string      Optional description.
 *      ...         as many inputs as needed.
 * O    number      Optional description.
 *      ...         as many outputs as needed.
 * X    yes/no      Breaks the chain if ...
 * </pre>
 */
public function EXE(I_O $IO);
```
#####Output
The output of the `I_O` visitor is set by calling the `_O()` method, with an unlimited amount of arguments.

Calling this method effectively erases the internal memory of the `I_O` visitor,
replacing it with each value that is passed as an argument of the `_O()` method.

These new values will be returned in the next \_Link\_, with each call to the `I_()` method:
```php
$IO->_O('foo', 56, ['bar', 'baz'], $object);
// In the next link:
$IO->I_(Type:STRING); // Returns 'foo'
$IO->I_(Type:NUMBER); // Returns 56
$IO->I_(Type:MULTI); // Returns array('bar', 'baz)
$IO->I_('MyApp\MyClass'); // Returns the MyApp\MyClass object
```

After updating the `I_O` visitor's internal state, the `_O()` method returns the visitor itself,
which makes the following shortcut possible:
```php
public function EXE(I_O $IO)
{
    return $IO->_O('foo');
}
```

Of course, PHP passes objects by reference, which suggests it's unnecessary to return the `I_O` object in a \_Chain\_ execution.
However, it is a requirement of the \_Link\_ interface for clarity,
and to make the following shortcut possible when manipulating a \_Chain\_:
```php
$result = $chain->EXE($IO)
                ->I_(Type:STRING);
```
####In an ideal world
If we imagine a \_Link\_ library that is large enough to cover most application needs,
we could easily port the entire library in many languages, including assembly,
and make it possible to design an application in a language agnostic manner, using a graphical interface.

Such solutions will be widely used in the future,
to address the current explosion of programming languages.
