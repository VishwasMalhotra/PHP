<?php
   session_name('user_form');
   session_start();
function echo_session_variable($key)
{
    if (isset($_SESSION[$key])) {
       echo htmlspecialchars($_SESSION[$key], ENT_QUOTES, "UTF-8");
    }
}

function set_birth_date()
{
    if ($_SESSION["birthDate"] != NULL) {
        for ($i = 1; $i < 32; $i++) {
            if ($_SESSION["birthDate"] == $i) {
                echo "<option value='$i' selected>" . "$i" . "</option>";
            } else {
                echo "<option value='$i'>" . "$i" . "</option>";
            }
        }
        echo "<option value='' disabled>DD</option>";
    } else {
        for ($i = 1; $i < 32; $i++) {
            echo "<option value='$i'>" . "$i" . "</option>";
        }
        echo "<option value='' selected disabled>DD</option>";
    }
}

function set_birth_month()
{
    $months = array(
        '',
        'January',
        'Febuary',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    );
    if ($_SESSION["birthMonth"] != NULL) {
        for ($i = 1; $i < count($months); $i++) {
            if ($_SESSION["birthMonth"] == $i) {
                echo "<option value='$i' selected>" . "$months[$i]" . "</option>";
            } else {
                echo "<option value='$i'>" . "$months[$i]" . "</option>";
            }
        }
        echo "<option value='' disabled>MM</option>";
    } else {
        for ($i = 1; $i < count($months); $i++) {
            echo "<option value='$i'>" . "$months[$i]" . "</option>";
        }
        echo "<option value='' selected disabled>MM</option>";
    }
}

function set_birth_year()
{
    if ($_SESSION["birthYear"] != NULL) {
        for ($i = 2006; $i > 1947; $i--) {
            if ($_SESSION["birthYear"] == $i) {
                echo "<option value='$i' selected>" . "$i" . "</option>";
            } else {
                echo "<option value='$i'>" . "$i" . "</option>";
            }
        }
        echo "<option value='' disabled>YY</option>";
    } else {
        for ($i = 2006; $i > 1947; $i--) {
            echo "<option value='$i'>" . "$i" . "</option>";
        }
        echo "<option value='' selected disabled>YY</option>";
    }
}

function preferred_month()
{
    $months = array(
        '',
        'January',
        'Febuary',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    );
    if ($_SESSION["preferredClientMonth"] != NULL) {
        for ($i = 1; $i < count($months); $i++) {
            if ($_SESSION["preferredClientMonth"] == $i) {
                echo "<option value='$i' selected>" . "$months[$i]" . "</option>";
            } else {
                echo "<option value='$i'>" . "$months[$i]" . "</option>";
            }
        }
        echo "<option value='' disabled>MM</option>";
    } else {
        for ($i = 1; $i < count($months); $i++) {
            echo "<option value='$i'>" . "$months[$i]" . "</option>";
        }
        echo "<option value='' selected disabled>MM</option>";
    }
}

function preferred_year()
{
    if ($_SESSION["preferredClientYear"]) {
        for ($i = 2018; $i <= 2026; $i++) {
            if ($_SESSION["preferredClientYear"] == $i) {
                echo "<option value='$i' selected>" . "$i" . "</option>";
            } else {
                echo "<option value='$i'>" . "$i" . "</option>";
            }
        }
        echo "<option value='' disabled>YY</option>";
    } else {
        for ($i = 2018; $i <= 2026; $i++) {
            echo "<option value='$i'>" . "$i" . "</option>";
        }
        echo "<option value='' selected disabled>YY</option>";
    }
}

function display_table_education()
{
    $levelOfEdu = array(
        'Matric(10th)',
        '10+2',
        'Graduation',
        'Post-Graduation',
        'Diploma',
        'Any Other Qualification'
    );
    $x = array(
        'fieldSubjects',
        'yearOfPassing',
        'percentage',
        'backlog',
        'Board'
    );
    for ($row = 0; $row < count($levelOfEdu); $row++) {
        echo "<tr>" . "<th>" . $levelOfEdu[$row];
        for ($cell = 0; $cell < 5; $cell++) {
            if (isset($_SESSION['educationOfuser'][$row][$x[$cell]])) {
                echo "<td><input type='text' class='form-control table' name='eduQual[$row][" . $x[$cell] . "]'
       value='" . htmlspecialchars($_SESSION['educationOfuser'][$row][$x[$cell]], ENT_QUOTES, "UTF-8") . "'/>";
            } else {
                echo "<td><input type='text' class='form-control table' name='eduQual[$row][" . $x[$cell] . "]'/>";
            }
        }
    }
}

function display_table_ielts()
{
    $y = array(
        'typeofexam',
        'dateoftest',
        'listening',
        'reading',
        'writing',
        'speaking',
        'overallBand'
    );
    for ($row = 0; $row < 1; $row++) {
        echo "<tr>";
        for ($cell = 0; $cell < 7; $cell++) {
            if (isset($_SESSION['foreignTest'][$cell][$y[$cell]])) {
                echo "<td><input type='text' class='form-control table' name='ielts[$cell][" . $y[$cell] . "]'
       value='" . htmlspecialchars($_SESSION['foreignTest'][$cell][$y[$cell]], ENT_QUOTES, "UTF-8") . "'/>";
            } else {
                echo "<td><input type='text' class='form-control table' name='ielts[$cell][" . $y[$cell] . "]'/>";
            }
        }
    }
}

function display_table_experience()
{
    $z = array(
        'employerName',
        'employerAddress',
        'designation',
        'salary',
        'from',
        'to'
    );
    for ($row = 0; $row < 1; $row++) {
        echo "<tr>";
        for ($cell = 0; $cell < 6; $cell++) {
            if (isset($_SESSION['userExperience'][$cell][$z[$cell]])) {
                echo "<td><input type='text' class='form-control table' name='experience[$cell][" . $z[$cell] . "]'' value='" . htmlspecialchars($_SESSION['userExperience'][$cell][$z[$cell]], ENT_QUOTES, "UTF-8") . "'/>";
            } else {
                echo "<td><input type='text' class='form-control table' name='experience[$cell][" . $z[$cell] . "]'/>";
            }
        }
    }
}
?>
