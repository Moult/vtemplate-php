<?php

/**
 * vtemplate  Driver/Email.php
 *
 * @package   Driver
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   MIT
 */

/**
 * A driver for emailing functionality.
 *
 * Recommended usage:
 * class Foo extends Driver_Emailer implements Domain_Requirement
 *
 * This driver uses Swiftmailer.
 *
 * @package Driver
 */
class Driver_Emailer
{
    private $instance;
    private $config;
    private $to;
    private $from;
    private $body = '';
    private $html = NULL;

    public function __construct()
    {
        $this->instance = Swift_Message::newInstance();
        $this->config = Kohana::$config->load('email');
        $this->to = $this->config->get('default_to');
        $this->from = $this->config->get('default_from');
    }

    /**
     * Sets the 'to' email address.
     *
     * Example:
     * $emailer->set_to(array('foo@bar.com' => 'Foo Name', 'bar@foo.com' = 'Bar Name'));
     *
     * @param array $to An array of email addresses to send to.
     *
     * @return void
     */
    public function set_to($to)
    {
        $this->to = $to;
    }

    /**
     * Sets the 'from' email address.
     *
     * Example:
     * $emailer->set_from(array('foo@bar.com' => 'Foo Name', 'bar@foo.com' => 'Bar Name'));
     *
     * @param array $from An array of email addresses to send from.
     *
     * @return void
     */
    public function set_from($from)
    {
        $this->from = $from;
    }

    /**
     * Sets the HTML content of the email.
     *
     * Example:
     * $emailer->set_html('<html>Foo</html>');
     *
     * @param strong $html The HTML alternative part of the message
     *
     * @return void
     */
    public function set_html($html)
    {
        $this->html = $html;
    }

    /**
     * Sets the subject of the email.
     *
     * Example:
     * $emailer->set_subject('Foobar');
     *
     * @param string $subject The subject of the email
     *
     * @return void
     */
    public function set_subject($subject)
    {
        $this->instance->setSubject($subject);
    }

    /**
     * Sets the plaintext body of the email.
     *
     * Example:
     * $emailer->set_body('Foo bar foo bar foo bar');
     *
     * @param string $body The body of the email
     *
     * @return void
     */
    public function set_body($body)
    {
        $this->body = $body;
    }

    /**
     * Sends out a new email.
     *
     * Example:
     * $emailer->send();
     *
     * @return void
     */
    public function send()
    {
        $this->instance->setTo($this->to);
        $this->instance->setFrom($this->from);
        $this->instance->setBody($this->body, 'text/plain');
        if ($this->html !== NULL)
        {
            $this->instance->addPart($this->html, 'text/html');
        }
        $smtp = $this->config->get('smtp');
        if ($smtp['ssl'])
        {
            $transport = Swift_SmtpTransport::newInstance($smtp['host'], $smtp['port'], 'ssl');
        }
        else
        {
            $transport = Swift_SmtpTransport::newInstance($smtp['host'], $smtp['port']);
        }
        $transport->setUsername($smtp['username'])->setPassword($smtp['password']);
        $mailer = Swift_Mailer::newInstance($transport);
        $mailer->send($this->instance);
    }
}
