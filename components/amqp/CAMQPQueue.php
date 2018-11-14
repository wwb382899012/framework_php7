<?php

/**
 * @ingroup CAMQP
 */

/**
 * @class   CAMQPQueue
 * @brief   Represents an AMQP queue
 * @details
 *
 * "A" - Team:
 * @author     Andrey Evsyukov <thaheless@gmail.com>
 * @author     Alexey Spiridonov <a.spiridonov@2gis.ru>
 * @author     Alexey Papulovskiy <a.papulovskiyv@2gis.ru>
 * @author     Alexander Biryukov <a.biryukov@2gis.ru>
 * @author     Alexander Radionov <alex.radionov@gmail.com>
 * @author     Andrey Trofimenko <a.trofimenko@2gis.ru>
 * @author     Artem Kudzev <a.kiudzev@2gis.ru>
 *   
 * @link       http://www.2gis.ru
 * @copyright  2GIS
 * @license http://www.Modframework.com/license/
 *
 * Requirements:
 * ---------------------
 *  - Mod 1.1.x or above
 *  - AMQP PHP library
 *
 */
class CAMQPQueue extends AMQPQueue
{
	/**
     * @param integer $flags A bitmask of any of the flags: AMQP_NOACK. 
	 * @brief Retrieve the next message from the queue.
	 */
    public function get($flags = AMQP_NOPARAM ) //As original AMQPQueue default value
    {
        //Mod::trace("Trying to get messages", "CEXT.CAMQP.CAMQPQueue.get");

	   return parent::get($flags);
    }
    
    /**
     * Acknowledge the receipt of a message.
     *
     * This method allows the acknowledgement of a message that is retrieved
     * without the AMQP_AUTOACK flag through AMQPQueue::get() or
     * AMQPQueue::consume()
     *
     * @param string  $delivery_tag The message delivery tag of which to
     *                              acknowledge receipt.
     * @param integer $flags        The only valid flag that can be passed is
     *                              AMQP_MULTIPLE.
     *
     * @throws AMQPChannelException    If the channel is not open.
     * @throws AMQPConnectionException If the connection to the broker was lost.
     *
     * @return boolean
     */
    public function ack($deliveryTag, $flags = AMQP_NOPARAM)
    {
        Mod::trace("Execute with params: " . json_encode(func_get_args()), "CEXT.CAMQP.CAMQPQueue.ack");
        return parent::ack($deliveryTag, $flags);
    }


    /**
     * Bind the given queue to a routing key on an exchange.
     *
     * @param string $exchange_name Name of the exchange to bind to.
     * @param string $routing_key   Pattern or routing key to bind with.
     * @param array  $arguments     Additional binding arguments.
     *
     * @throws AMQPChannelException    If the channel is not open.
     * @throws AMQPConnectionException If the connection to the broker was lost.
     *
     * @return boolean
     */
    //public function bind($exchangeName, $routingKey = null, array $arguments = array())
    public function bind($exchangeName, $routingKey = null,  $arguments = array())
    {
        Mod::trace("Execute with params: " . json_encode(func_get_args()), "CEXT.CAMQP.CAMQPQueue.bind");
        return parent::bind($exchangeName, $routingKey, $arguments);
    }
    /**
     * Cancel a queue that is already bound to an exchange and routing key.
     *
     * @param string $consumer_tag The consumer tag cancel. If no tag provided,
     *                             or it is empty string, the latest consumer
     *                             tag on this queue will be used and after
     *                             successful request it will set to null.
     *                             If it also empty, no `basic.cancel`
     *                             request will be sent. When consumer_tag give
     *                             and it equals to latest consumer_tag on queue,
     *                             it will be interpreted as latest consumer_tag usage.
     *
     * @throws AMQPChannelException    If the channel is not open.
     * @throws AMQPConnectionException If the connection to the broker was lost.
     *
     * @return bool;
     */
    public function cancel($consumerTag=null)
    {
        Mod::trace("Execute with params: " . json_encode(func_get_args()), "CEXT.CAMQP.CAMQPQueue.cancel");
        return parent::cancel($consumerTag);
    }

    /**
     * Consume messages from a queue.
     *
     * Blocking function that will retrieve the next message from the queue as
     * it becomes available and will pass it off to the callback.
     *
     * @param callable | null $callback    A callback function to which the
     *                              consumed message will be passed. The
     *                              function must accept at a minimum
     *                              one parameter, an AMQPEnvelope object,
     *                              and an optional second parameter
     *                              the AMQPQueue object from which callback
     *                              was invoked. The AMQPQueue::consume() will
     *                              not return the processing thread back to
     *                              the PHP script until the callback
     *                              function returns FALSE.
     *                              If the callback is omitted or null is passed,
     *                              then the messages delivered to this client will
     *                              be made available to the first real callback
     *                              registered. That allows one to have a single
     *                              callback consuming from multiple queues.
     * @param integer $flags        A bitmask of any of the flags: AMQP_AUTOACK,
     *                              AMQP_JUST_CONSUME. Note: when AMQP_JUST_CONSUME
     *                              flag used all other flags are ignored and
     *                              $consumerTag parameter has no sense.
     *                              AMQP_JUST_CONSUME flag prevent from sending
     *                              `basic.consume` request and just run $callback
     *                              if it provided. Calling method with empty $callback
     *                              and AMQP_JUST_CONSUME makes no sense.
     * @param string   $consumerTag A string describing this consumer. Used
     *                              for canceling subscriptions with cancel().
     *
     * @throws AMQPChannelException    If the channel is not open.
     * @throws AMQPConnectionException If the connection to the broker was lost.
     *
     * @return void
     */
    public function consume($callback = null, $flags = AMQP_NOPARAM, $consumerTag = null)
    {
        Mod::trace("Execute with params: " . json_encode(func_get_args()), "CEXT.CAMQP.CAMQPQueue.consume");
        return parent::consume($callback, $flags, $consumerTag);
    }

    /**
     * Delete a queue from the broker.
     *
     * This includes its entire contents of unread or unacknowledged messages.
     *
     * @param integer $flags        Optionally AMQP_IFUNUSED can be specified
     *                              to indicate the queue should not be
     *                              deleted until no clients are connected to
     *                              it.
     *
     * @throws AMQPChannelException    If the channel is not open.
     * @throws AMQPConnectionException If the connection to the broker was lost.
     *
     * @return integer The number of deleted messages.
     */
    public function delete($flags = AMQP_NOPARAM)
    {
        Mod::trace("Delete queue '$queueName'", "CEXT.CAMQP.CAMQPQueue.delete");
        return parent::delete($flags);
    }

     /**
     * Purge the contents of a queue.
     *
     * @throws AMQPChannelException    If the channel is not open.
     * @throws AMQPConnectionException If the connection to the broker was lost.
     *
     * @return boolean
     */
    public function purge()
    {
        Mod::trace("Purge queue '$queueName'", "CEXT.CAMQP.CAMQPQueue.purge");
        return parent::purge();
    }

    /**
     * Remove a routing key binding on an exchange from the given queue.
     *
     * @param string $exchange_name The name of the exchange on which the
     *                              queue is bound.
     * @param string $routing_key   The binding routing key used by the
     *                              queue.
     * @param array  $arguments     Additional binding arguments.
     *
     * @throws AMQPChannelException    If the channel is not open.
     * @throws AMQPConnectionException If the connection to the broker was lost.
     *
     * @return boolean
     */
    public function unbind($exchangeName, $routingKey = "", $arguments = array())
    {
        Mod::trace("Execute with params: " . json_encode(func_get_args()), "CEXT.CAMQP.CAMQPQueue.unbind");
        return parent::unbind($exchangeName, $routingKey, $arguments);
    }


    /**
     * Get the configured name.
     *
     * @return string The configured name as a string.
     */
    public function getName()
    {
        return parent::getName();
    }
    /**
     * Mark a message as explicitly not acknowledged.
     *
     * Mark the message identified by delivery_tag as explicitly not
     * acknowledged. This method can only be called on messages that have not
     * yet been acknowledged, meaning that messages retrieved with by
     * AMQPQueue::consume() and AMQPQueue::get() and using the AMQP_AUTOACK
     * flag are not eligible. When called, the broker will immediately put the
     * message back onto the queue, instead of waiting until the connection is
     * closed. This method is only supported by the RabbitMQ broker. The
     * behavior of calling this method while connected to any other broker is
     * undefined.
     *
     * @param string  $delivery_tag Delivery tag of last message to reject.
     * @param integer $flags        AMQP_REQUEUE to requeue the message(s),
     *                              AMQP_MULTIPLE to nack all previous
     *                              unacked messages as well.
     *
     * @throws AMQPChannelException    If the channel is not open.
     * @throws AMQPConnectionException If the connection to the broker was lost.
     *
     * @return boolean
     */
    public function nack($delivery_tag, $flags = AMQP_NOPARAM)
    {
        return parent::nack($delivery_tag, $flags);
    }
    /**
     * Mark one message as explicitly not acknowledged.
     *
     * Mark the message identified by delivery_tag as explicitly not
     * acknowledged. This method can only be called on messages that have not
     * yet been acknowledged, meaning that messages retrieved with by
     * AMQPQueue::consume() and AMQPQueue::get() and using the AMQP_AUTOACK
     * flag are not eligible.
     *
     * @param string  $delivery_tag Delivery tag of the message to reject.
     * @param integer $flags        AMQP_REQUEUE to requeue the message(s).
     *
     * @throws AMQPChannelException    If the channel is not open.
     * @throws AMQPConnectionException If the connection to the broker was lost.
     *
     * @return boolean
     */
    public function reject($delivery_tag, $flags = AMQP_NOPARAM)
    {
        return parent::reject($delivery_tag, $flags);
    }

}
