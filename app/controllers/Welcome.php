<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
$backgroundColor = "#FFA500";
class Welcome extends Controller {
    public function __construct() {
        parent::__construct();
		session_start(); 
		
		
    }

    public function index() {
       
        $this->call->view('welcome_page');
    }

	public function register() {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email']; // Add email input in your registration form.
	
		if (empty($username) || empty($password) || empty($email)) {
			echo "Username, password, and email are all required.";
		} else {
			// Initialize the arrays in the session if they don't exist
			if (!isset($_SESSION['registered_users'])) {
				$_SESSION['registered_users'] = [];
			}
			if (!isset($_SESSION['registered_passwords'])) {
				$_SESSION['registered_passwords'] = [];
			}
			if (!isset($_SESSION['registered_emails'])) {
				$_SESSION['registered_emails'] = [];
			}
	
			// Check if the username or email is already registered
			if (in_array($username, $_SESSION['registered_users']) || in_array($email, $_SESSION['registered_emails'])) {
				echo '<script>';
				echo 'alert("Username or email already registered");';
				echo 'window.location.href = "' . BASE_URL . 'welcome/index";'; // Redirect to the registration page
				echo '</script>';
			} else {
				// Add the registered username, password, and email to the respective lists
				$_SESSION['registered_users'][] = $username;
				$_SESSION['registered_passwords'][] = $password;
				$_SESSION['registered_emails'][] = $email; // Store the email.
	
				// Display an alert using JavaScript on the same page
				echo '<script>';
				echo 'alert("Registration successful! You can now login.");';
				echo 'window.location.href = "' . BASE_URL . 'welcome/index";'; // Redirect to the login page
				echo '</script>';
			}
		}
	}
	
	
	public function login() {
		
		if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
			
			$this->call->view('user_list');
		} else {
			
			$this->call->view('login');
		}
	}
	
	public function authenticate() {
		if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
	
			if (isset($_SESSION['registered_users']) && isset($_SESSION['registered_passwords']) && isset($_SESSION['registered_emails'])) {
				$registeredUsers = $_SESSION['registered_users'];
				$registeredPasswords = $_SESSION['registered_passwords'];
				$registeredEmails = $_SESSION['registered_emails'];
	
				$userIndexByUsername = array_search($username, $registeredUsers);
				$userIndexByEmail = array_search($email, $registeredEmails);
	
				if (($userIndexByUsername !== false || $userIndexByEmail !== false) &&
					($password === $registeredPasswords[$userIndexByUsername] || $password === $registeredPasswords[$userIndexByEmail])) {
					// Correct username or email and password, allow login
					$_SESSION['user_logged_in'] = true; // Set user as logged in
					$this->call->view('user_list');
				} else {
					echo '<script>';
					echo 'alert("Invalid Username/Email or Password!");';
					echo 'window.location.href = "' . BASE_URL . 'welcome/login";'; // Redirect to the login page
					echo '</script>';
				}
			} else {
				echo '<script>';
				echo 'alert("No User found!!");';
				echo 'window.location.href = "' . BASE_URL . 'welcome/login";'; // Redirect to the login page
				echo '</script>';
			}
		} else {
			echo "Invalid login request. Please fill in both username or email and password.";
		}
	}
	
public function logout() {
    // Check if the user is logged in
    if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
        // Unset the user-related session data and leave other session data intact
        unset($_SESSION['user_logged_in']);

        // Redirect to the login page
        $this->call->view('login'); // Replace with the appropriate view
    } else {
        echo "You are not logged in. No need to log out.";
    }
}


}
?>
