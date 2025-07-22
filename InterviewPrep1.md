# Basic Concepts for Interviews.

`Variables`

`Variables Type: var let const`

`Constants`

`Data Types`: 

Primitive / Non Primitive
String          Array
Char            Objects
Int             Functions
float/double    Regex


`Functions:`

Function Params
Colouser/Callback/Anonymouse

`Promises` : 

In JavaScript, a Promise is an object that represents the eventual completion (or failure) of an asynchronous operation and its resulting value.  
A Promise can be in one of three states:
Pending: The initial state; the asynchronous operation is still in progress.
Fulfilled (or Resolved): The operation completed successfully, and the Promise has a resulting value.
Rejected: The operation failed, and the Promise has an error reason.

`Async / Await`

async function callApi(){
    const response = axios.get('/getData from Api');
    return response;
}

const response = await callApi();

`Exception Handling:`

`Try/Catch/throw`

try{
    // success code hanlding
}catch(e){
    // handle the exception
    if(e.type == 'undefined'){
        // I'll handle myself
    }else if(e.type == 'not an array'){
        // I'll handle myself
    }else{
        new throw('Something else happend please refresh your page.');
    }
}

`Recursion Functions`

function recurse(i){
    if(i == 10) return;
    recurse(++i);
}
recurse(1);

`strongly typed language vs weakly typed language`

`Linked Lists (singly, doubly, Circular)`

`Learn Array Sortings with different Types of Algo`.

## Object-Oriented Programming (OOP)

`Class`

`Access Modifiers` Private/Public/Protected

`Properties` Class Variables

`Methods` Member functions of a Class.

`Static Properties` // Very Imp

`Static Functions` // Very Imp

`Friend Functions`

`Setters and Getters`

private name = '';

function setName(name){
    this.name = name;
}

function getName(name){
    return this.name;
}

`Constructors and Destructors` : types of constructors 1- default 2- Parameterized 3- Copy

`Memory Leaks`

`Objects`

### Inheritance Related

`Inheritance`

`Levels of inheritance` : multiple / multi-level / Diamond Problem/

`Overloading`

`OverRiding`

`Inheritance, Encapsulation`

`Generalization`

`Pointers`

`Dangling Pointers`

`Pass By Reference / Value`

`Abstraction, Polymorphism, `

`Abstract Classes`
