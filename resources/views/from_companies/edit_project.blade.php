@extends('layouts.app')
@section('content')



<div class="container">

    <div id="all_container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <h4>プロジェクト選択</h4>
                <form action="{{ url('/from_companies/from_company_project') }}" method="POST">
                {{ csrf_field() }}
                        <select class="form-control from-company" name="from_company_id" >
                            @forelse ($fromCompanies as $company)
                                <option value="{{ $company->id }}" >{{ $company->project_name }}</option>
                            @empty
                                <option value="">-</option>
                            @endforelse
                        </select>
                        <hr>
                            <button type="submit" class="btn btn-primary" name="project_edit" value="project_change">プロジェクト編集</button>
                </form>
                
                <hr>
                    <a class="btn btn-primary" href="{{ url('/to_companies/csv_import') }}" role="button">CSVインポート</a>
                <hr>
                    <a class="btn btn-primary" href="{{ url('/home') }}" role="button">Homeに戻る</a>
            </div>


            <table class="table table-striped from_company_container" style="width:60%;margin-left:20px;">
                <tr>
                    <td>プロジェクト名</td>
                    <td><input type="text"></th>
                    <td><button ></button></th>
                </tr>

                <tr>
                    <td>プロジェクト名</td>
                    <td><input type="text"></th>
                    <td><button ></button></th>
                </tr>

                <tr>
                <tr>
            </table>


        </div>
    </div>
</div>
@endsection
