<?php
namespace App\Enums;

class TaskStatusEnum
{
    public const TO_DO = 'To Do';
    public const IN_PROGRESS = 'In Progress';
    public const DONE = 'Done';

    public const ALL = [
      self::TO_DO,
      self::IN_PROGRESS,
      self::DONE,
    ];
}
