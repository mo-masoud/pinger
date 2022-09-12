@extends('layouts.master')
@section('PageTitle',$breadcrumb['title'])
@section('PageContent')
@includeIf('layouts.inc.breadcrumb')



<div class="row">
    <div class="col-8 mx-auto mt-3">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('branches.store') }}" method="post" enctype="multipart/form-data">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingNameInput" name="name" value="{{ old("name") }}" placeholder="@lang('name')" />
                        <label for="floatingNameInput">@lang('name')</label>
                        @error('name')
                            <span style="color:red;">
                                {{ $errors->first('name') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatinglan_ipInput" name="lan_ip" value="{{ old("lan_ip") }}" placeholder="@lang('lan_ip')" />
                        <label for="floatinglan_ipInput">@lang('lan_ip')</label>
                        @error('lan_ip')
                            <span style="color:red;">
                                {{ $errors->first('lan_ip') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingwan_ipInput" name="wan_ip" value="{{ old("wan_ip") }}" placeholder="@lang('wan_ip')" />
                        <label for="floatingwan_ipInput">@lang('wan_ip')</label>
                        @error('wan_ip')
                            <span style="color:red;">
                                {{ $errors->first('wan_ip') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingtunnel_ipInput" name="tunnel_ip" value="{{ old("tunnel_ip") }}" placeholder="@lang('tunnel_ip')" />
                        <label for="floatingtunnel_ipInput">@lang('tunnel_ip')</label>
                        @error('tunnel_ip')
                            <span style="color:red;">
                                {{ $errors->first('tunnel_ip') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingipsInput" name="ips" value="{{ old("ips") }}" placeholder="@lang('ips')" />
                        <label for="floatingipsInput">@lang('ips')</label>
                        @error('ips')
                            <span style="color:red;">
                                {{ $errors->first('ips') }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingispInput" name="isp" value="{{ old("isp") }}" placeholder="@lang('isp')" />
                        <label for="floatingispInput">@lang('isp')</label>
                        @error('isp')
                            <span style="color:red;">
                                {{ $errors->first('isp') }}
                            </span>
                        @enderror
                    </div>

                    <div class="row" style=" margin-top: 20px; ">
                        <div style="text-align: right">
                            @csrf
                            <button type="submit" class="btn btn-primary w-md">@lang('Submit')</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>


@endsection

