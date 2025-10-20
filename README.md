# PHP File Handling and Uploads

This form collects a users first name, last name, email, password and a profile image.
The text inputs are sanitized using htmlspecialchars() and trimmed with trim()
Adding preg_match() validates that all text fields are filled and that the email format is correct.
Valid user data is appended to membership.txt.
Uploaded files are validated to ensure the images do not exceed 300KB in size.
AI Copilot was used to check for typos in code.