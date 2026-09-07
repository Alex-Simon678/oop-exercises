<?php

class Attachment
{
    public function __construct(private readonly string $filePath)
    {
        if (!file_exists($filePath)) {
            throw new InvalidArgumentException("File does not exist: {$filePath}");
        }
    }

    public function getPath(): string
    {
        return $this->filePath;
    }
}

class Mailer
{
    public function __construct(private readonly string $fromAddress)
    {
    }

    public function sendMail(string $to, string $subject, string $message, array $attachments = []): bool
    {
        $headers = $this->buildHeaders($attachments);

        return mail($to, $subject, $message, $headers);
    }

    private function buildHeaders(array $attachments): string
    {
        $headers = "From: {$this->fromAddress}\r\n";

        if (!empty($attachments)) {
            $paths = array_map(fn(Attachment $attachment) => $attachment->getPath(), $attachments);
            $headers .= "Attachments: " . implode(", ", $paths) . "\r\n";
        }

        return $headers;
    }
}