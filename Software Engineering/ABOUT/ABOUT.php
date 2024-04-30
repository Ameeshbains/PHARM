<?php

require_once './ABOUT/class/ABOUT.class.php';



$companyName = "Adapharmacy";
$mission = "At Adapharmacy, our mission is simple: to prioritize your health and well-being above all else. We believe that access to quality healthcare is a fundamental right, and we are dedicated to delivering personalized care tailored to your needs.";
$services = array(
    array(
        'title' => 'Expert Care',
        'description' => 'Our team of experienced pharmacists is here to answer your questions, provide medication counseling, and ensure you receive the highest standard of care.'
    ),
    array(
        'title' => 'Convenience',
        'description' => 'We offer convenient services such as prescription refills, medication synchronization, and delivery options to make managing your health easier.'
    ),
    array(
        'title' => 'Community Engagement',
        'description' => 'We are actively involved in our community, hosting health events, wellness workshops, and partnering with local organizations to promote health education and awareness.'
    ),
    array(
        'title' => 'Comprehensive Services',
        'description' => 'From prescription medications to over-the-counter products, medical supplies, and vaccinations, we provide a wide range of healthcare services to meet your needs.'
    )
);

$aboutPage = new AboutUs($companyName, $mission, $services);
$aboutPage->displayAboutPage();
?>
