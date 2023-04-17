@extends('layout.base')

@section('links')
    <link rel="stylesheet" type="text/css" href="{{ url('css/study.css') }}" >
@endsection

@section('title')
    Учёба
@endsection

@section('body')
    <main>
    <div class="box-2">
        Полное название университета:<br>
        «Севастопольский Государственный Университет»<br>
        Полное название кафедра:<br>
        «Информационные Системы»<br>
    </div>

        <!-- Таблица -->
    <table>
        <thead>
            <!-- Заголовки -->
            <tr>
                <td colspan="9">
                    ПЛАН УЧЕБНОГО ПРОЦЕССА
                </td>
            </tr>
            <tr>
                <th rowspan="2">№</th>
                <th rowspan="2">Дисциплина</th>
                <th rowspan="2">Кафедра</th>
                <th colspan="6">Всего часов</th>
            </tr>
            <tr>
                <th>Всего</th>
                <th>Ауд</th>
                <th>Лк</th>
                <th>Лб</th>
                <th>Пр</th>
                <th>СРС</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td class="name">Экология</td>
                <td class="k">БЖ</td>
                <td>54</td>
                <td>27</td>
                <td>18</td>
                <td>0</td>
                <td>9</td>
                <td>27</td>
            </tr>
            <tr>
                <th>2</th>
                <td class="name">Высшая математика</td>
                <td class="k">ВМ</td>
                <td>540</td>
                <td>282</td>
                <td>141</td>
                <td>0</td>
                <td>141</td>
                <td>258</td>
            </tr>
            <tr>
                <th>3</th>
                <td class="name">Русский язык и литература</td>
                <td class="k">НГиГ</td>
                <td>108</td>
                <td>54</td>
                <td>18</td>
                <td>0</td>
                <td>36</td>
                <td>54</td>
            </tr>
            <tr>
                <th>4</th>
                <td class="name">Основы дискретной математики</td>
                <td class="k">ИС</td>
                <td>216</td>
                <td>139</td>
                <td>87</td>
                <td>0</td>
                <td>52</td>
                <td>77</td>
            </tr>
            <tr>
                <th>5</th>
                <td class="name">Основы программирования и алгоритмические языки</td>
                <td class="k">ИС</td>
                <td>405</td>
                <td>210</td>
                <td>105</td>
                <td>87</td>
                <td>18</td>
                <td>195</td>
            </tr>
            <tr>
                <th>6</th>
                <td class="name">Основы экологии</td>
                <td class="k">ПЭОП</td>
                <td>54</td>
                <td>27</td>
                <td>18</td>
                <td>0</td>
                <td>9</td>
                <td>27</td>
            </tr>
            <tr>
                <th>7</th>
                <td class="name">Теория вероятностей и математическая статистика</td>
                <td class="k">ИС</td>
                <td>162</td>
                <td>72</td>
                <td>54</td>
                <td>18</td>
                <td>0</td>
                <td>90</td>
            </tr>
            <tr>
                <th>8</th>
                <td class="name">Физика</td>
                <td class="k">Физики</td>
                <td>324</td>
                <td>194</td>
                <td>106</td>
                <td>88</td>
                <td>0</td>
                <td>130</td>
            </tr>
            <tr>
                <th>9</th>
                <td class="name">Основы электротехники и электроники</td>
                <td class="k">ИС</td>
                <td>108</td>
                <td>72</td>
                <td>36</td>
                <td>18</td>
                <td>18</td>
                <td>36</td>
            </tr>
            <tr>
                <th>10</th>
                <td class="name">Численные методы в информатике</td>
                <td class="k">ИС</td>
                <td>189</td>
                <td>89</td>
                <td>36</td>
                <td>36</td>
                <td>17</td>
                <td>100</td>
            </tr>
            <tr>
                <th>11</th>
                <td class="name">Методы ислледования операций</td>
                <td class="k">ИС</td>
                <td>216</td>
                <td>104</td>
                <td>52</td>
                <td>35</td>
                <td>17</td>
                <td>112</td>
            </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    </main>
@endsection

