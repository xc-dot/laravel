<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>学生信息表</h2>
    <form action="{{route('sadd_do')}}" method="post">
    @csrf
    <table border='1'>
        <tr>
            <td>学生姓名：</td>
            <td><input type="text" name='name'></td>
        </tr>
        <tr>
            <td>学生年龄：</td>
            <td>
                <select name="age">
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                    <option>21</option>
                    <option>22</option>
                    <option>23</option>
                    <option>24</option>
                    <option>25</option>
                    <option>26</option>
                    <option>27</option>
                    <option>28</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>地址：</td>
            <td>
                市&nbsp;<select name="address">
                    <option>北京</option>
                </select>
                省&nbsp;<select name="address">
                    <option value="1">昌平</option>
                    <option value="2">房山</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>学生状态：</td>
            <td>
                <input type="radio" name='status' value='0' checked='checked'>在校
                <input type="radio" name='status' value='1'>离校
            </td>
        </tr>
         <tr>
            <td><input type="submit" value='提交'></td>
            <td></td>
         </tr>  
    </form>
    </table>
</body>
</html>