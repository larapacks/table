<div class="table-responsive">

    <table {!! $table->getHtmlAttributes() !!}>

        <thead>

            <tr>
                @foreach ($table->getColumns() as $column)
                    <th>
                        {{ $column->getReadableName() }}
                    </th>
                @endforeach
            </tr>

        </thead>

        <tbody>

            @foreach($table->getRows() as $row)

                <tr {!! $row->getHtmlAttributes() !!}>

                    @foreach($table->getColumns() as $column)

                        <td {!! $column->getHtmlAttributes() !!}>

                            {!! $row->getData($column) !!}

                        </td>

                    @endforeach

                </tr>

            @endforeach

            @if($table->isEmpty())

                <tr>
                    <td colspan="{{ count($table->getColumns()) }}">{{ $table->getEmpty() }}</td>
                </tr>

            @endif

        </tbody>

    </table>

</div>
