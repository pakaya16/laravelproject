<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:request {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $argument       = explode('/', $this->argument('name'));
        
        if (!empty($argument[0])) 
        {
            $namespace  = trim('\ ').$argument[0] ;
            $className  = $argument[1] ;
        }
        else
        {
            $namespace  = '' ;
            $className  = $this->argument('name') ;
        }

        $fileGen        = 'app/Http/Requests/'.$this->argument('name').'Request.php' ;
        $myfile         = fopen($fileGen, "w") or die("Unable to open file!");
$txt = "<?php
namespace App\Http\Requests".$namespace.";

use App\Http\Requests\Request;

class ".$className."Request extends Request
{
    /**
    * DateCreate ".date('Y-m-d')."
    */

    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        switch(\$this->method())
        {
            case 'GET':
            case 'DELETE':
            case 'POST':
            case 'PUT':
            case 'PATCH':
            {
                return [];
            }
            default:break;
        }
    }

    /**
    * Change Language from user choose.
    *
    * @return array
    */
    public function messages()
    {
        if (in_array(\$this->session()->get('lang'), Config('admin.listTransLang'))) 
        {

        }
    }
}";       

        fwrite($myfile, $txt);
        fclose($myfile);
        $this->info( 'Create success.' );
    }
}
