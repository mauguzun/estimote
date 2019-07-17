@extends ('admin.base_layout')

@section('title')
    Reports
@endsection

@section('toolbar')
    <div class="sort-wrapper">
        <button type="button" class="btn btn-primary toolbar-item">New</button>
    </div>
@endsection


@section('content')
    <table class="table">
        <thead>
        <tr>
            <th class="text-left">Dessert (100g serving)</th>
            <th>Calories</th>
            <th>Fat (g)</th>
            <th>Link</th>
            <th>Carbs</th>
            <th>Protein (g)</th>
            <th>Sodium (mg)</th>
            <th>Calcium (%)</th>
            <th>Iron (%)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-left">Frozen yogurt</td>
            <td>1.59</td>
            <td>6.0</td>
            <td>50</td>
            <td>4.0</td>
            <td>87</td>
            <td>20%</td>
            <td>4%</td>
            <td>6%</td>
        </tr>
        </tbody>
    </table>
@endsection