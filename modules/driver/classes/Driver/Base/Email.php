<?php

/**
 * vtemplate  Driver/Base/Email.php
 *
 * @package   Driver
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   MIT
 */

/**
 * A base driver for emailing functionality.
 *
 * Recommended usage:
 * class Driver_Email extends Driver_Base_Email implements Domain_Requirement
 *
 * This driver uses Swiftmailer.
 *
 * @package Driver
 */
class Driver_Base_Email
{
    /**
     * Sends out a simple plaintext email.
     *
     * @param string $to_address   The email address to send to.
     * @param string $from_address The email address to send from
     * @param string $subject      The subject of the email
     * @param string $body         The body of the email
     * @return void
     */
    public function send_email($to_address, $from_address, $subject, $body)
    {
        $message = Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($from_address)
            ->setTo($to_address)
            ->setBody($body);
        $config = Kohana::$config->load('email');
        $smtp = $config->get('smtp');
        $transport = Swift_SmtpTransport::newInstance($smtp['host'], $smtp['port'])
            ->setUsername($smtp['username'])
            ->setPassword($smtp['password']);
        $mailer = Swift_Mailer::newInstance($transport);
        $mailer->send($message);
    }
}
