<?php

class AboutUs {
    private $companyName;
    private $mission;
    private $services;

    public function __construct($companyName, $mission, $services) {
        $this->companyName = $companyName;
        $this->mission = $mission;
        $this->services = $services;
    }

    public function displayAboutPage() {
        echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>About Us - {$this->companyName}</title>

            </head>
            <body>
                <div class='container'>
                    <h1>About Us: {$this->companyName}</h1>
                    <p>Welcome to {$this->companyName}! We are your neighborhood pharmacy committed to providing exceptional pharmaceutical care and health services to our community.</p>

                    <h2>Our Mission: Your Health, Our Priority</h2>
                    <p>{$this->mission}</p>

                    <h2>What Sets Us Apart</h2>
                    <ul>";

                    foreach ($this->services as $service) {
                        echo "<li><strong>{$service['title']}:</strong> {$service['description']}</li>";
                    }

                    echo "</ul>

                    <h2>Our Commitment to Quality</h2>
                    <p>At {$this->companyName}, we are committed to upholding the highest standards of quality and safety. We adhere to strict guidelines and protocols to ensure the accuracy and efficacy of every medication we dispense.</p>

                    <h2>Get in Touch</h2>
                    <p>Whether you have questions about your medications, need advice on managing a chronic condition, or simply want to say hello, we're here for you. Visit us at our convenient location or contact us by phone or email – we look forward to serving you!</p>

                    <p>Thank you for choosing {$this->companyName} as your trusted partner in health and wellness. Your health is our priority, today and every day.</p>
                </div>
            </body>
            </html>";
    }
}

// Example usage:


?>
