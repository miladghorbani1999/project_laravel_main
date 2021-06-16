@extends('layouts.main')
@section('content')
<div class="col col-xl-8 mx-auto d-block">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">ایجاد پست</h6>
				</div>
				<div class="ui-block-content">


					<!-- Change Password Form -->

					<form action="{{url('/posts/store/')}}" method="POST" enctype="multipart/form-data">
					@csrf
						<div class="row">
                            <div   div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label class="control-label">عکس</label>
									<input style="float: right;" class="form-control" name="image" type="file" >
								<span class="material-input"></span></div>
							</div>
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">تیتر</label>
									<input class="form-control" name="title" type="text" >
								<span class="material-input"></span></div>
							</div>
                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">متن پست</label>
									<textarea class="form-control" name="description" rows="4" cols="50" ></textarea>
								    <span class="material-input"></span>
                                </div>
							</div>

							</div>

							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<button class="btn btn-primary btn-lg full-width">ثبت پست</button>
							</div>

						</div>
					</form>

					<!-- ... end Change Password Form -->
				</div>
			</div>
		</div>
@endsection
