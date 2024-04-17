<?php

class Calculator
{
    // Properties
    public $num1;
    public $num2;

    // Constructor
    public function __construct($num1, $num2)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    // Addition method
    public function add()
    {
        return $this->num1 + $this->num2;
    }

    // Subtraction method
    public function subtract()
    {
        return $this->num1 - $this->num2;
    }

    // Multiplication method
    public function multiply()
    {
        return $this->num1 * $this->num2;
    }

    // Division method
    public function divide()
    {
        if ($this->num2 == 0) {
            return "Cannot divide by zero";
        }
        return $this->num1 / $this->num2;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP Calculator</title>
    
</head>

<body>
    <h2>PHP Calculator</h2>
    <form action="estimate.php" method="post">
        <input type="text" name="num1">
        <input type="text" name="num2">
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <button type="submit">Calculate</button>
    </form>

    <?php

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operand1']) && isset($_POST['operand2']) && isset($_POST['operator'])) {
        // Retrieve values from form
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];

        // Create Calculator object
        $calc = new Calculator($num1, $num2);

        // Perform calculation based on operator
        switch ($operator) {
            case 'add':
                echo "Result: " . number_format($calc->add(), 2);
                break;
            case 'subtract':
                echo "Result: " . number_format($calc->subtract(), 2);
                break;
            case 'multiply':
                echo "Result: " . number_format($calc->multiply(), 2);
                break;
            case 'divide':
                echo "Result: " . number_format($calc->divide(), 2);
                break;
            default:
                echo "Invalid operator";
        }
    }
    ?>
</body>

</html>