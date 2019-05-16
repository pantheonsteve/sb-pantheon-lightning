<?php
/**
<<<<<<< HEAD
 * @see       https://github.com/zendframework/zend-diactoros for the canonical source repository
 * @copyright Copyright (c) 2015-2018 Zend Technologies USA Inc. (http://www.zend.com)
=======
 * Zend Framework (http://framework.zend.com/)
 *
 * @see       http://github.com/zendframework/zend-diactoros for the canonical source repository
 * @copyright Copyright (c) 2015-2016 Zend Technologies USA Inc. (http://www.zend.com)
>>>>>>> pantheon-drops-8/master
 * @license   https://github.com/zendframework/zend-diactoros/blob/master/LICENSE.md New BSD License
 */

namespace Zend\Diactoros\Response;

use Psr\Http\Message\ResponseInterface;
<<<<<<< HEAD
use RuntimeException;

use function ob_get_length;
use function ob_get_level;
use function sprintf;
use function str_replace;
use function ucwords;

/**
 * @deprecated since 1.8.0. The package zendframework/zend-httphandlerrunner
 *     now provides this functionality.
 */
trait SapiEmitterTrait
{
    /**
     * Checks to see if content has previously been sent.
     *
     * If either headers have been sent or the output buffer contains content,
     * raises an exception.
     *
     * @throws RuntimeException if headers have already been sent.
     * @throws RuntimeException if output is present in the output buffer.
     */
    private function assertNoPreviousOutput()
    {
        if (headers_sent()) {
            throw new RuntimeException('Unable to emit response; headers already sent');
        }

        if (ob_get_level() > 0 && ob_get_length() > 0) {
            throw new RuntimeException('Output has been emitted previously; cannot emit response');
        }
=======

trait SapiEmitterTrait
{
    /**
     * Inject the Content-Length header if is not already present.
     *
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    private function injectContentLength(ResponseInterface $response)
    {
        if (! $response->hasHeader('Content-Length')) {
            // PSR-7 indicates int OR null for the stream size; for null values,
            // we will not auto-inject the Content-Length.
            if (null !== $response->getBody()->getSize()) {
                return $response->withHeader('Content-Length', (string) $response->getBody()->getSize());
            }
        }

        return $response;
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Emit the status line.
     *
     * Emits the status line using the protocol version and status code from
     * the response; if a reason phrase is available, it, too, is emitted.
     *
<<<<<<< HEAD
     * It is important to mention that this method should be called after
     * `emitHeaders()` in order to prevent PHP from changing the status code of
     * the emitted response.
     *
     * @param ResponseInterface $response
     *
     * @see \Zend\Diactoros\Response\SapiEmitterTrait::emitHeaders()
=======
     * @param ResponseInterface $response
>>>>>>> pantheon-drops-8/master
     */
    private function emitStatusLine(ResponseInterface $response)
    {
        $reasonPhrase = $response->getReasonPhrase();
<<<<<<< HEAD
        $statusCode   = $response->getStatusCode();

        header(sprintf(
            'HTTP/%s %d%s',
            $response->getProtocolVersion(),
            $statusCode,
            ($reasonPhrase ? ' ' . $reasonPhrase : '')
        ), true, $statusCode);
=======
        header(sprintf(
            'HTTP/%s %d%s',
            $response->getProtocolVersion(),
            $response->getStatusCode(),
            ($reasonPhrase ? ' ' . $reasonPhrase : '')
        ));
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Emit response headers.
     *
     * Loops through each header, emitting each; if the header value
     * is an array with multiple values, ensures that each is sent
     * in such a way as to create aggregate headers (instead of replace
     * the previous).
     *
     * @param ResponseInterface $response
     */
    private function emitHeaders(ResponseInterface $response)
    {
<<<<<<< HEAD
        $statusCode = $response->getStatusCode();

=======
>>>>>>> pantheon-drops-8/master
        foreach ($response->getHeaders() as $header => $values) {
            $name  = $this->filterHeader($header);
            $first = $name === 'Set-Cookie' ? false : true;
            foreach ($values as $value) {
                header(sprintf(
                    '%s: %s',
                    $name,
                    $value
<<<<<<< HEAD
                ), $first, $statusCode);
=======
                ), $first);
>>>>>>> pantheon-drops-8/master
                $first = false;
            }
        }
    }

    /**
<<<<<<< HEAD
=======
     * Loops through the output buffer, flushing each, before emitting
     * the response.
     *
     * @param int|null $maxBufferLevel Flush up to this buffer level.
     */
    private function flush($maxBufferLevel = null)
    {
        if (null === $maxBufferLevel) {
            $maxBufferLevel = ob_get_level();
        }

        while (ob_get_level() > $maxBufferLevel) {
            ob_end_flush();
        }
    }

    /**
>>>>>>> pantheon-drops-8/master
     * Filter a header name to wordcase
     *
     * @param string $header
     * @return string
     */
    private function filterHeader($header)
    {
        $filtered = str_replace('-', ' ', $header);
        $filtered = ucwords($filtered);
        return str_replace(' ', '-', $filtered);
    }
}
