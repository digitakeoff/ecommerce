<?php
namespace App\Services;

use SendGrid\SendGrid as ApiClient;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\MessageConverter;

class SendgridTransportSerice extends AbstractTransport
{
    /**
     * The Mailchimp API client.
     *
     * @var \MailchimpTransactional\ApiClient
     */
    protected $client;
    /**
     * Create a new Mailchimp transport instance.
     *
     * @param  \MailchimpTransactional\ApiClient  $client
     * @return void
     */
    public function __construct(ApiClient $client)
    {
        $this->client = SendGrid(getenv('SENDGRID_API_KEY'));
    }


    /**
     * {@inheritDoc}
     */
    protected function doSend(SentMessage $message): void
    {
        $email = MessageConverter::toEmail($message->getOriginalMessage());
        
        $this->client->send(['message' => [
            'from_email' => $email->getFrom(),
            'to' => collect($email->getTo())->map(function ($email) {
                return ['email' => $email->getAddress(), 'type' => 'to'];
            })->all(),
            'subject' => $email->getSubject(),
            'text' => $email->getTextBody(),
        ]]);
    }

    /**
     * Get the string representation of the transport.
     *
     * @return string
     */
    public function __toString(): string
    {
        return 'sendgrid';
    }
}