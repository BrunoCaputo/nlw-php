<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CloseProject extends Command
{

  protected $signature = 'app:close-project';


  protected $description = 'Command description';

  public function handle()
  {
    Project::query()
      ->where('ends_at', '<=', now())
      ->update(['status' => 'closed']);
    Log::info('Rodou o comando');
  }
}
