@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    
                    
                    <div>
                        <div>
                            @foreach ($balance as $item)
                     
                            <h1>{{ $item->crossWalletBalance }}</h1>
                                
                            @endforeach
                         </div>
                         
                        <div>Add categories</div>
                        <form action="/addCategories" method="POST">
                            {{ csrf_field() }}
                            
                            <select class="form-select" name="parent_id" id="catForm">
                                <option selected="selected" divsabled>Select parent category</option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger text-left">{{ $errors->first('parent_category') }}</span>
                            <br>
                            <input class="form-control" name="name" type="text" placeholder="add categories">
                            <span class="text-danger text-left">{{ $errors->first('category_name') }}</span>
                            <br>
                            <input class="btn btn-success" type="submit" value="Add category" >
                        </form>
                        <br>
                    </div>
                    <div class="center">
                        <div>Add Students</div>
                        <form action="/addStudents" method="POST">
                            {{ csrf_field() }}
                            <input class="form-control" name="name" type="text" placeholder="Add student's name">
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            <br>
                            <input class="form-control" name="contact"  type="text" placeholder="Add student's contact">
                            <span class="text-danger text-left">{{ $errors->first('contact') }}</span>
                            <br>

                            <input  class="btn btn-success"  type="submit" value="Add Student">
                        </form>
                    </div>
                    <br>
                    <div>
                        <div>Add courses</div>
                        <form action="/addCourses" method="POST">
                            {{ csrf_field() }}
                            <select class="form-select" name="cat_id" id="catForm">
                                <option selected="selected" divsabled>Select category</option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger text-left">{{ $errors->first('category') }}</span>
                            <br>
                            <input class="form-control" name="name" type="text" placeholder="Add course name">
                            <span class="text-danger text-left">{{ $errors->first('course_name') }}</span>
                            <br>
                            <input class="form-control" name="duration" type="text" placeholder="Add course duration">  
                            <span class="text-danger text-left">{{ $errors->first('duration') }}</span>  
                            <br>   
                            <input class="btn btn-success" type="submit" value="Add course">
                            <br>
                        </form>
                    </div>
                    <br>
                    <div class="center">
                        <div>Add courses to student</div>
                        <form action="/studentCourses" method="POST">
                            {{ csrf_field() }}
                            {{-- <input class="form-control" name="s_name" type="text" placeholder="Add student's name"> --}}
                            <br>
                            <select class="form-select" name="s_id" id="stuForm">
                                <option selected="selected" divsabled>Select student</option>
                                @foreach ($student as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger text-left">{{ $errors->first('student_id') }}</span>

                            <br>
                            <select class="form-select courseCategory" name="category_id" id="catForm">
                                <option selected="selected" divsabled>Select category</option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger text-left">{{ $errors->first('category_id') }}</span>
                            <br>
                            <select class="form-select" name="c_id" id="catAdd">
                                <option selected="selected" divsabled>Select courses</option>
                                @foreach ($course as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger text-left">{{ $errors->first('course_id') }}</span>
                            {{-- <input class="form-control" name="name" type="text" placeholder="Add course name">    --}}
                            <br>   
                            <input class="btn btn-success" type="submit" value="Add course">
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on('change','.courseCategory',function(){
            console.log('clicked');
            
            var cat_id = $(this).val();
            console.log(cat_id);

            $('#catAdd').empty();
            $.ajax({
                type: 'GET',
                url: 'GetSubCaurseAgainstMainCat/' + cat_id,
                success: function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#catAdd').empty();
                response.forEach(element => {
                    $('#catAdd').append(`<option value="${element['id']}">${element['name']}</option>`);
                    });

                }
            });

            
        });
    });
</script>
@endsection

