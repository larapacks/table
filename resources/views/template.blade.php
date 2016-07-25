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

                <tr>

                    @foreach($table->getColumns() as $column)

                        <td {!! $column->getHtmlAttributes() !!}>

                            @if($column->getValue())

                                {!! call_user_func($column->getValue(), $row) !!}

                            @elseif(is_array($row) || $row instanceof ArrayAccess)

                                {!! $row[$column->getName()] !!}

                            @endif

                        </td>

                    @endforeach

                </tr>

            @endforeach

        </tbody>

    </table>

</div>
