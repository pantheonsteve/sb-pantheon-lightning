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

/**
 * @deprecated since 1.8.0. The package zendframework/zend-httphandlerrunner
 *     now provides this functionality.
 */
=======
use RuntimeException;

>>>>>>> pantheon-drops-8/master
class SapiEmitter implements EmitterInterface
{
    use SapiEmitterTrait;

    /**
     * Emits a response for a PHP SAPI environment.
     *
     * Emits the status line and headers via the header() function, and the
     * body content via the output buffer.
     *
     * @param ResponseInterface $response
<<<<<<< HEAD
     */
    public function emit(ResponseInterface $response)
    {
        $this->assertNoPreviousOutput();

        $this->emitHeaders($response);
        $this->emitStatusLine($response);
=======
     * @param null|int $maxBufferLevel Maximum output buffering level to unwrap.
     */
    public function emit(ResponseInterface $response, $maxBufferLevel = null)
    {
        if (headers_sent()) {
            throw new RuntimeException('Unable to emit response; headers already sent');
        }

        $response = $this->injectContentLength($response);

        $this->emitStatusLine($response);
        $this->emitHeaders($response);
        $this->flush($maxBufferLevel);
>>>>>>> pantheon-drops-8/master
        $this->emitBody($response);
    }

    /**
     * Emit the message body.
     *
     * @param ResponseInterface $response
     */
    private function emitBody(ResponseInterface $response)
    {
        echo $response->getBody();
    }
}
