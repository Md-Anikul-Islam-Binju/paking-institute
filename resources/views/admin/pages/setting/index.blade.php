@extends('admin.app')

@section('admin_content')

    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Website Setting</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('setting.createOrUpdate', $setting->id ?? '') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        {{-- Name --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Website Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $setting->name ?? '') }}">

                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Logo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Logo</label>

                            <input type="file"
                                   name="logo"
                                   class="form-control">

                            @if(isset($setting->logo))
                                <div class="mt-2">
                                    <img src="{{ asset('images/setting/'.$setting->logo) }}"
                                         width="120"
                                         class="border rounded">
                                </div>
                            @endif

                        </div>


                        {{-- Site URL --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Site URL</label>

                            <input type="text"
                                   name="site_url"
                                   class="form-control"
                                   value="{{ old('site_url',$setting->site_url ?? '') }}">
                        </div>


                        {{-- Twitter --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Twitter</label>

                            <input type="text"
                                   name="twitter"
                                   class="form-control"
                                   value="{{ old('twitter',$setting->twitter ?? '') }}">
                        </div>


                        {{-- Facebook --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Facebook</label>

                            <input type="text"
                                   name="facebook"
                                   class="form-control"
                                   value="{{ old('facebook',$setting->facebook ?? '') }}">
                        </div>


                        {{-- Instagram --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Instagram</label>

                            <input type="text"
                                   name="instagram"
                                   class="form-control"
                                   value="{{ old('instagram',$setting->instagram ?? '') }}">
                        </div>


                        {{-- Youtube --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Youtube</label>

                            <input type="text"
                                   name="youtube"
                                   class="form-control"
                                   value="{{ old('youtube',$setting->youtube ?? '') }}">
                        </div>


                        {{-- Linkedin --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Linkedin</label>

                            <input type="text"
                                   name="linkedin"
                                   class="form-control"
                                   value="{{ old('linkedin',$setting->linkedin ?? '') }}">
                        </div>


                        {{-- Description --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>

                            <textarea name="description"
                                      class="form-control"
                                      rows="5">{{ old('description',$setting->description ?? '') }}</textarea>
                        </div>


                        {{-- Submit --}}
                        <div class="col-md-12">

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>

                                {{ isset($setting)
                                    ? 'Update Setting'
                                    : 'Save Setting'
                                }}

                            </button>

                        </div>

                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
