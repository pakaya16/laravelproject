<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Creatework extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:work {name} {type} {nameUserCreate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create:work name nameUserCreate';

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
        
        if (!empty($argument[0]) && !empty($argument[1])) 
        {
            $namespace  = trim('\ ').$argument[0] ;
            $className  = $argument[1] ;

            $dir            = 'app/Http/Controllers/'.ucfirst($argument[0]) ;

            if (!file_exists($dir) && !is_dir($dir)) 
            {
                mkdir($dir);         
            }

            $dir            = 'app/Http/Requests/'.ucfirst($argument[0]) ;

            if (!file_exists($dir) && !is_dir($dir)) 
            {
                mkdir($dir);         
            }

            if ( $this->argument('type') == 'admin')
            {
                $dir            = 'resources/views/admin' ;

                if (!file_exists($dir) && !is_dir($dir)) 
                {
                    mkdir($dir);         
                }

                $dir            = 'resources/views/admin/'.strtolower($argument[1]) ;

                if (!file_exists($dir) && !is_dir($dir)) 
                {
                    mkdir($dir);         
                }                 
            }
            else
            {
                $dir            = 'resources/views/admin/'.strtolower($this->argument('name')) ;

                if (!file_exists($dir) && !is_dir($dir)) 
                {
                    mkdir($dir);         
                }     
            }
        }
        else
        {
            $namespace  = '' ;
            $className  = $this->argument('name') ;
        }

        if ($this->createController($namespace, $className)) 
        {
            $this->info( 'Controller Create success.' );
        }

        if ($this->createRequest($namespace, $className)) 
        {
            $this->info( 'Request Create success.' );
        }

        if ($this->createView($namespace, $className, $argument)) 
        {
            $this->info( 'View Create success.' );
        }
    }

    private function createController(string $namespace, string $nameClass)
    {
        $fileGen        = 'app/Http/Controllers/'.$this->argument('name').'Controller.php' ;
        $myfile         = fopen($fileGen, "w") or die("Unable to open file!");

        if( $namespace )
        {
            $useView        = 'use View;' ;
            $defaultView    = strtolower($namespace) . '.'.strtolower($nameClass).'.index' ;
        }
        else
        {
            $useView        = '' ;
            $defaultView    = '' ;
        }

$txt = "<?php

namespace App\Http\Controllers{$namespace};

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests".$namespace."\\".$nameClass."Request;
use App\Http\Controllers\Controller;
{$useView}

class {$nameClass}Controller extends Controller
{
    /**
    * DateCreate ".date('Y-m-d')."
    * Create By ".$this->argument('nameUserCreate')."
    */

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return View::make('{$defaultView}') ;
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  App\Http\Requests".$namespace."\\".$nameClass."Request  \$request
    * @return \Illuminate\Http\Response
    */
    public function store({$nameClass}Request \$request)
    {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  \$id
    * @return \Illuminate\Http\Response
    */
    public function show(int \$id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  \$id
    * @return \Illuminate\Http\Response
    */
    public function edit(int \$id)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  App\Http\Requests".$namespace."\\".$nameClass."Request  \$request
    * @param  int  \$id
    * @return \Illuminate\Http\Response
    */
    public function update({$nameClass}Request \$request, int \$id)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  \$id
    * @return \Illuminate\Http\Response
    */
    public function destroy(int \$id)
    {
        //
    }
}";
        fwrite($myfile, $txt);
        fclose($myfile);
        return true ;        
    }

    private function createRequest(string $namespace, string $nameClass)
    {
        $fileGen        = 'app/Http/Requests/'.$this->argument('name').'Request.php' ;
        $myfile         = fopen($fileGen, "w") or die("Unable to open file!");
$txt = "<?php
namespace App\Http\Requests".$namespace.";

use App\Http\Requests\Request;

class ".$nameClass."Request extends Request
{
    /**
    * DateCreate ".date('Y-m-d')."
    * Create By ".$this->argument('nameUserCreate')."
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
            {
                return [] ;
            }
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
            return [] ;
        }

        return [] ;
    }
}";       
        fwrite($myfile, $txt);
        fclose($myfile);
        return true ;
    }

    private function createView(string $namespace, string $nameClass, $argument)
    {
        if ($this->argument('type')=='admin')
        {
            $fileGen        = 'resources/views/admin/'.strtolower($argument[1]).'/index.blade.php' ;
        }
        else
        {
            $fileGen        = 'resources/views/'.strtolower($this->argument('name')).'/index.blade.php' ;
        }
        
        $myfile         = fopen($fileGen, "w") or die("Unable to open file!");
$txt = '@extends("admin.common.main")
@section("content")
@stop';
        fwrite($myfile, $txt);
        fclose($myfile);
        return true ;
    }
}