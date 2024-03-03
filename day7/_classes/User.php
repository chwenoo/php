<?php

class User {
    private $name;
    private $email;
    private $gender;
    private $website;
    private $comment;
    private $password;
    private $confirmPassword;

    function __construct($name, $email, $gender, $website, $comment, $password, $confirmPassword) {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->website = $website;
        $this->comment = $comment;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getWebsite() {
        return $this->website;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getConfirmPassword() {
        return $this->confirmPassword;
    }

    public function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function validateName() {
        if (empty($this->name)) {
            return false;
        } else {
            $name = $this->testInput($this->name);
            // PHP - Validate Name
            if(!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                return false;
            } else {
                return true;
            }                
        }
    }

    public function validateEmail() {
        if (empty($this->email)) {
            return false;
        } else {
            $email = $this->testInput($this->email);
            // PHP - Validate email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function validateGender() {
        if (empty($this->gender)) {
            return false;
        } else {
            $gender = $this->testInput($this->gender);
            return true;
        }
    }

    public function validateWebsite() {
        if (empty($_POST["website"])) {
            return "* Website URL is required";
        } else {
            $website = $this->testInput($_POST["website"]);
            // check if url address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                return "Invalid URL";
            } else {
                return true;
            }
        }
    }  
    
    public function validateComment() {
        if (empty($this->comment)) {
            return false;
        } else {
            $comment = $this->testInput($this->comment);
            return true;
        }
    }

    public function validatePassword() {
        if (empty($this->password)) {
            return false;
        } else {
            $password = $this->testInput($this->password);
            if (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $password === 0)) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function validateConfirmPassword() {
        if (empty($this->comfirmPassword)) {
            return false;
        } else {
            $confirmPassword = $this->testInput($this->confirmPassword);
            if ($password!= $confirmPassword) {
                // return "* Passwords do not match";
                return false;
            } else {
                return true;
            }
        }
    }
}