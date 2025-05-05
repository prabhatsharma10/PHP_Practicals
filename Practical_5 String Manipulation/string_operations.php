<!DOCTYPE html>
<html>
<head>
    <title>PHP String Manipulation Tool</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function toggleOptionalInputs() {
            const operation = document.querySelector('[name="operation"]').value;
            document.getElementById('find_word_section').style.display = (operation === 'find_word') ? 'block' : 'none';
            document.getElementById('replace_word_section').style.display = (operation === 'replace_word') ? 'block' : 'none';
        }
        window.onload = toggleOptionalInputs;
    </script>
</head>
<body>
<h2 align="center">String Manipulation</h2>

<form method="post">
    <label>Enter Your String:</label>
    <textarea name="input_string" rows="4" required><?= $_POST['input_string'] ?? '' ?></textarea>

    <label>Select Operation:</label>
    <select name="operation" required onchange="toggleOptionalInputs()">
        <option value="">--Choose--</option>
        <option value="length" <?= ($_POST['operation'] ?? '') === 'length' ? 'selected' : '' ?>>1. Calculate Length</option>
        <option value="lowercase" <?= ($_POST['operation'] ?? '') === 'lowercase' ? 'selected' : '' ?>>2. Convert to Lowercase</option>
        <option value="uppercase" <?= ($_POST['operation'] ?? '') === 'uppercase' ? 'selected' : '' ?>>2. Convert to Uppercase</option>
        <option value="whitespace" <?= ($_POST['operation'] ?? '') === 'whitespace' ? 'selected' : '' ?>>3. Count White Spaces</option>
        <option value="count_all" <?= ($_POST['operation'] ?? '') === 'count_all' ? 'selected' : '' ?>>4. Count Words, Lines, and Characters</option>
        <option value="find_word" <?= ($_POST['operation'] ?? '') === 'find_word' ? 'selected' : '' ?>>5. Find Position of Word</option>
        <option value="replace_word" <?= ($_POST['operation'] ?? '') === 'replace_word' ? 'selected' : '' ?>>6. Replace Word</option>
        <option value="count_vowels" <?= ($_POST['operation'] ?? '') === 'count_vowels' ? 'selected' : '' ?>>7. Count Vowel Occurrences</option>
    </select>

    <div id="find_word_section" style="display:none;">
        <label>Enter Word to Find (for option 5):</label>
        <input type="text" name="find_word" value="<?= $_POST['find_word'] ?? '' ?>">
    </div>

    <div id="replace_word_section" style="display:none;">
        <label>Enter Word to Replace (for option 6):</label>
        <input type="text" name="replace_from" value="<?= $_POST['replace_from'] ?? '' ?>">
        <label>Replace With:</label>
        <input type="text" name="replace_to" value="<?= $_POST['replace_to'] ?? '' ?>">
    </div>

    <input type="submit" name="submit" value="Perform Operation">
</form>

<?php
if (isset($_POST['submit'])) {
    $string = $_POST['input_string'] ?? '';
    $operation = $_POST['operation'];

    echo "<div class='result'><h3>Result:</h3>";

    switch ($operation) {
        case 'length':
            echo "Length: " . strlen($string);
            break;

        case 'lowercase':
            echo "Lowercase: " . strtolower($string);
            break;

        case 'uppercase':
            echo "Uppercase: " . strtoupper($string);
            break;

        case 'whitespace':
            $count = substr_count($string, ' ');
            echo "White Spaces: " . $count;
            break;

        case 'count_all':
            $words = str_word_count($string);
            $lines = substr_count($string, "\n") + 1;
            $chars = strlen($string);
            echo "Words: $words<br>Lines: $lines<br>Characters: $chars";
            break;

        case 'find_word':
            $word = $_POST['find_word'] ?? '';
            if ($word !== '') {
                $pos = strpos($string, $word);
                echo $pos !== false ? "Position of '$word': $pos" : "'$word' not found in string.";
            } else {
                echo "Please enter a word to find.";
            }
            break;

        case 'replace_word':
            $from = $_POST['replace_from'] ?? '';
            $to = $_POST['replace_to'] ?? '';
            if ($from !== '') {
                $new_str = str_replace($from, $to, $string);
                echo "Modified String: <br>" . nl2br(htmlspecialchars($new_str));
            } else {
                echo "Please enter the word to replace.";
            }
            break;

        case 'count_vowels':
            $vowels = preg_match_all('/[aeiouAEIOU]/', $string, $matches);
            echo "Number of vowels: " . $vowels;
            break;

        default:
            echo "Invalid operation selected.";
            break;
    }

    echo "</div>";
}
?>

</body>
</html>
