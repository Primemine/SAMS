@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="mt-8 flex justify-between">
            <div class="">
                    <form method="post" enctype="multipart/form-data" action="{{ url('/home/upload') }}" >
                            {{ csrf_field() }}
                        <div class="flex bg-grey-lighter">
                            <label class="w-40 flex flex-col items-center py-1 bg-white text-blue   tracking-wide border border-blue cursor-pointer hover:bg-blue">
                               
                                <span class="mt-2 text-base leading-normal">Select a file</span>
                                <input type='file' class="hidden" name="imported_file"/>
                            </label>
                                <input type="submit" name="upload" class="px-3 py-1  text-white text-center transition duration-500 ease-in-out bg-green-600 " value="Upload">
                            </div>
                    </form>
                </div>
                <div class="">
                    
                    <form class="" action="{{ url('/home/search') }}" id="myTable" method="GET">
                        {{ csrf_field() }}
                        <input name="search" type="text" class=" text-gray-900  px-32 py-3 rounded-sm border-blue-500" placeholder="Search by College name">
                        <button type="submit" class="btn-block bg-green-600 py-3 px-6 text-white rounded-sm">Search</button>
                    </form>
                </div>
                
                <div class="">
                    {!!Form::open(["action" => ["\App\Http\Controllers\HomeController@download"],"method"=>"GET" ,"class"=>""]) !!}
                        {{ Form::button('Download', ['type' => 'Download', 'class' => 'btn-block text-center text-white bg-green-500 px-6 py-3 rounded-sm hover:bg-green-600'] )  }}
                    {!!Form::close()!!}
                </div>
            </div>

        <div class="table  p-2">
        @if(count($allocations) == 0)
        <div class="p-5">
            <div>
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300 ">
                    <div slot="avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info w-5 h-5 mx-2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                    </div>
                    <div class="text-xl font-normal  max-w-full flex-initial">
                        
                            <div class="text-sm font-base"><b>No records to load</b> </div>
                       
                    </div>
                    <div class="flex flex-auto flex-row-reverse">
                    </div>
                </div>
               
            </div>
        </div>
        @else
            <table class="w-full border table-responsive">
                <thead>
                    <tr class="bg-gray-50 border-b">
                        
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                ID
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Full Name
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Sex
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Form Four index Number
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Regstration number
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                College
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Course
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                YoS
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Account number
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                MA
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Books and Stationary
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Tution Fee
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Field
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Research
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                SRF
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Total
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Action
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                            @foreach( $allocations as $allocation )
                            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">{{ $allocation->index_no }}</td>
                                <td class="p-2 border-r">{{ $allocation->full_name }}</td>
                                <td class="p-2 border-r">{{ $allocation->sex }}</td>
                                <td class="p-2 border-r">{{ $allocation->registration_no }}</td>
                                <td class="p-2 border-r">{{ $allocation->reg_no }}</td>
                                <td class="p-2 border-r">{{ $allocation->collage }}</td>
                                <td class="p-2 border-r">{{ $allocation->course }}</td>
                                <td class="p-2 border-r">{{ $allocation->yos }}</td>
                                <td class="p-2 border-r">{{ $allocation->account_number }}</td>
                                <td class="p-2 border-r">{{ $allocation->ma }}</td>
                                <td class="p-2 border-r">{{ $allocation->books_stationary }}</td>
                                <td class="p-2 border-r">{{ $allocation->tution_free }}</td>
                                <td class="p-2 border-r">{{ $allocation->field }}</td>
                                <td class="p-2 border-r">{{ $allocation->research }}</td>
                                <td class="p-2 border-r">{{ $allocation->srf }}</td>
                                <td class="p-2 border-r">{{ $allocation->total }}</td>
                                <td class="flex justify-center pt-3">
                                        <div x-data="{ showModal2: false }" :class="{'overflow-y-hidden': showModal2 }">
                                            <a href="#"  @click="showModal2 = true" type="button" class="bg-blue-500 p-2  text-white hover:shadow-lg text-xs font-thin">Edit</a>
                                                <div
                                                class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto"
                                                x-show="showModal2"
                                                x-transition:enter="transition duration-300"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition duration-300"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                >
                                                <div class="relative sm:w-1/2 md:w-1/2 lg:w-1/2 mx-2 sm:mx-auto my-10 opacity-100">
                                                    <div
                                                    class="relative bg-white shadow-lg rounded-lg text-gray-900 z-20"
                                                    @click.away="showModal2 = false"
                                                    x-show="showModal2"
                                                    x-transition:enter="transition transform duration-300"
                                                    x-transition:enter-start="scale-0"
                                                    x-transition:enter-end="scale-100"
                                                    x-transition:leave="transition transform duration-300"
                                                    x-transition:leave-start="scale-100"
                                                    x-transition:leave-end="scale-0"
                                                    >
                                                    <header class="flex flex-col justify-center items-center pt-3">
                                                        <div class="flex justify-center">
                                                                <h1 class="text-lg uppercase text-gray-500">Edit Record</h1>
                                                        </div>
                                                    </header>
                                                    <main class="flex h-screen items-center justify-center">
                                                        {!!Form::open(["action" => ["\App\Http\Controllers\HomeController@editRecord" ,$allocation->id],"method"=>"POST"]) !!}
                                                                {{ csrf_field() }}
                                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-8 mx-4">
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Full name') !!}
                                                                {!! Form::text('full_name',$allocation->full_name,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Collage') !!}
                                                                {!! Form::text('collage',$allocation->collage,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Index number') !!}
                                                                {!! Form::text('index_no',$allocation->index_no,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-8 mt-5 mx-3">
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Gender') !!}
                                                                {!! Form::text('sex',$allocation->sex,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Form four index number') !!}
                                                                {!! Form::text('registration_no',$allocation->registration_no,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Registration no') !!}
                                                                {!! Form::text('reg_no',$allocation->reg_no,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                            </div>

                                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-8 mt-5 mx-3">
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Year of study') !!}
                                                                {!! Form::text('yos',$allocation->yos,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","id"=>"yos","type"=>"number"]) !!}
                                                                </div>
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Course') !!}
                                                                {!! Form::text('course',$allocation->course,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","id"=>"ma","type"=>"text"]) !!}
                                                                </div>
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Books and stationary') !!}
                                                                {!! Form::text('books_stationary',$allocation->books_stationary,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","id"=>"books_stationary","type"=>"text"]) !!}
                                                                </div>
                                                            </div>

                                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-8 mt-5 mx-3">
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Tution Fee') !!}
                                                                {!! Form::text('tution_free',$allocation->tution_free,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Field') !!}
                                                                {!! Form::text('field',$allocation->field,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Research') !!}
                                                                {!! Form::text('research',$allocation->research,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                            </div>

                                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-8 mt-5 mx-3">
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('SRF') !!}
                                                                {!! Form::text('srf',$allocation->srf,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Account number') !!}
                                                                {!! Form::text('account_number',$allocation->account_number,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('MA') !!}
                                                                {!! Form::text('ma',$allocation->ma,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","id"=>"ma","type"=>"text"]) !!}
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-8 mt-5 mx-3">
                                                                <div class="grid grid-cols-1">
                                                                {!! Form::label('Total') !!}
                                                                {!! Form::text('total',$allocation->total,["class"=>"py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:border-transparent","type"=>"text"]) !!}
                                                                </div>
                                                            </div>
                                                            <div class='flex items-center justify-center  md:gap-8 gap-8 pt-2 pb-2'>
                                                                {{Form::submit("Submit",["class"=>"w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2"])}}                                                       
                                                            </div>
                                                        {!!Form::close()!!}
                                                    </main>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        {!!Form::open(["action" => ["\App\Http\Controllers\HomeController@delete" ,$allocation->id],"method"=>"POST" ,"class"=>"float-right"]) !!}
                                            {{Form::hidden("_method","DELETE")}}
                                            {{ Form::button('Remove', ['type' => 'Delete', 'class' => 'bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin'] )  }}
                                        {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                </tbody>            
            </table>
        @endif
        <nav class="mt-5">
                <ul class="pagination justify-content-center">
                    {{ $allocations->links() }}
                </ul>
        </nav>
    </div>
    </div>
</main>
    
@endsection
