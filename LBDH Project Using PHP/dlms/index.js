//Javascript code implementing the FizzBuzz logic using a function://

/*Write a program that prints the numbers from 1 to 100. For multiples of 3, print "Fizz"; for
multiples of 5, print "Buzz"; and for numbers that are multiples of both 3 and 5, print
"FizzBuzz".*/
function fizzBuzz(){
    for ( let num= 1; num <= 100; num++){
        if (num % 3 === 0 && 5 ===0){
            console.log("FizzBuzz");

        }else if (num % 3 === 0){
            console.log("Fizz");
        }else if (num % 5 === 0 ){
            console.log("BUZZ");
        }else{
            console.log(num);
        }

    }
}
fizzBuzz(30)

/* 2 Write a program to generate the Fibonacci sequence up to 100.?*/

function fibonacci(n) {

   // Base cases for the first two numbers (0 and 1)
    if (n <= 1) {
      return n;
    }
  
    // Initialize variables to hold the two previous numbers (0 and 1)
    let a = 0, b = 1;
  
    // Loop for n-2 iterations, calculating the next number in each iteration
    for (let i = 2; i <= n; i++) {
      // The next number is the sum of the previous two numbers
      let c = a + b;
  
      // Update the previous two numbers for the next iteration
      a = b;
      b = c;
    }
  
    // After the loop, b holds the nth number in the sequence
    return b;
  }
  
  // Generate the sequence up to 100
  for (let i = 0; i < 100; i++) {
    // Calculate the next number in the sequence
    let fib_num = fibonacci(i);
  
    // Print the number
    console.log(fib_num);
  }


  //3.Write a program that takes an integer as input and returns true if the input is a power of two.

  function isPowerOfTwo(n){
    if (n< 1){
      return false
    }
    while (n>1){
        if (n % 2 !== 0){
            return false
        }
        n = n/2

    }
    return true
  }
  console.log(isPowerOfTwo(1))//true
  console.log(isPowerOfTwo(2))//true
  console.log(isPowerOfTwo(5))//false


  /* 4.Write a program that accepts a string as input, capitalizes the first letter of each word in the
string, and then returns the result string.*/
  // Function to capitalize the first letter of each word



function capitalizeWords(sentence) {
    
    const words = sentence.split(" "); // Split sentence into words using spaces
    for (let i = 0; i < words.length; i++) {
      words[i] = words[i][0].toUpperCase() + words[i].slice(1); // Capitalize first letter with slicing
    }
    return words.join(" "); // Join words back into a sentence
  }
  
  // Function to generate the Fibonacci sequence up to a certain number
  function fibonacci(n) {
   
    if (n <= 1) {
      return n;
    }
  
    let a = 0, b = 1;
    for (let i = 2; i <= n; i++) {
      let c = a + b;
      a = b;
      b = c;
    }
    return b;
  }
  
  // Test the capitalizeWords function
  console.log(capitalizeWords("i love javascript")); // Output: I Love Javascript
  
  // Generate and print the Fibonacci sequence up to 10
  for (let i = 0; i < 10; i++) {
    console.log(fibonacci(i)); // Print each Fibonacci number
  }

 /* 5.Write a program that takes an integer as input and returns an integer with reversed digit
  ordering.*/
  function reverseInteger(num) {
    let reversed = 0;
    let sign = Math.sign(num);
    num = Math.abs(num);
  
    while (num > 0) {
      const digit = num % 10;
      reversed = (reversed * 10) + digit;
      num = Math.floor(num / 10);
    }
  
    return reversed * sign;
  }
  
  // Test cases
  console.log(reverseInteger(500)); // Output: 5
  console.log(reverseInteger(-56)); // Output: -65
  console.log(reverseInteger(-90)); // Output: -9
  console.log(reverseInteger(91)); // Output: 19



/*6.Write a program that takes an integer as input and returns an integer with reversed digit
ordering.*/

  function countVowels(sentence) {
   
    // Convert the sentence to lowercase for case-insensitive counting
    sentence = sentence.toLowerCase();
  
    const vowels = "aeiou"; // String containing all vowels
    let vowelCount = 0;
  
    // Iterate through each character in the sentence
    for (let char of sentence) {
      // Check if the character is a vowel using the indexOf method
      if (vowels.indexOf(char) !== -1) {
        vowelCount++;
      }
    }
  
    return vowelCount;
  }
  
  // Test the function with different sentences
  console.log(countVowels("Hello World")); // Output: 3 (considering 'e' in 'Hello')
  console.log(countVowels("This is a test")); // Output: 4
  console.log(countVowels("Why not")); // Output: 1
  
  