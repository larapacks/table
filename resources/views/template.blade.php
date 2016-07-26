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

                                {!! call_user_func($column->getValue(), $row->getData()) !!}

                            @elseif(is_array($row->getData()) || $row->getData() instanceof ArrayAccess)

                                {!! $row->getData()[$column->getName()] !!}

                            @endif

                        </td>

                    @endforeach

                </tr>

            @endforeach

            @if(empty($table->getRows()))

                <tr>
                    <td colspan="{{ count($table->getColumns()) }}">{{ $table->getEmpty() }}</td>
                </tr>

            @endif

        </tbody>

    </table>

</div>
