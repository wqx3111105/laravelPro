<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;  
use Illuminate\Queue\SerializesModels;  
use Illuminate\Broadcasting\PrivateChannel;  
use Illuminate\Foundation\Events\Dispatchable;  
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LoginEvent  implements ShouldBroadcast{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  /**
    * @var User 用户模型
    */
  protected $user;
  protected $channel;

  /**
    * 实例化事件时传递这些信息
    */
  public function __construct($user,$channel)
  {
    $this->user = $user;
    $this->channel = $channel;
  }

  public function getUser()
  {
    return $this->user;
  }


  /**
    * Get the channels the event should broadcast on.
    *
    * @return Channel|array
    */
  public function broadcastOn()
  {
      return [$this->channel];
  }

    public function broadcastWith()
    {
        return ['user_id' => $this->user];
    }
}