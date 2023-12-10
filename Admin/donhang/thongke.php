<div class="admin-container">
    <aside class="admin-sidebar">
        <h2>Admin Panel</h2>
        <nav>
            <ul>
                <li><a href="index.php?act=add-danhmuc">Thêm Danh mục</a></li>
                <li>
                    <a href="index.php?act=add-sanpham">Thêm Sản phẩm</a>
                </li>
                <li><a href="index.php?act=dstk">QL Tài khoản</a></li>
                <li><a href="index.php?act=dsbl">QL Bình luận</a></li>
                <li><a href="index.php?act=dsdh">QL Đơn hàng</a></li>
                <li><a href="index.php?act=thongke" class="active">Thống kê</a></li>
            </ul>
        </nav>
    </aside>
    <main class="admin-content">
        <div class="box1">
            <a href="../index.php">
                <input type="button" value="Trở về trang bán hàng">
            </a>
        </div>
        <br><br><br>
        <div class="box2">
            <div class="form12">
                <h3>Doanh thu</h3>
                <!-- <form action="" method="post" id="searchForm">
                    <label for="startDate">Từ ngày:</label>
                    <input type="date" name="startDate" style="width:100%; max-width:120px;" id="startDate" required>

                    <label for="endDate">Đến ngày:</label>
                    <input type="date" name="endDate" style="width:100%; max-width:120px;" id="endDate" required>

                    <button type="submit">Tìm kiếm</button>
                </form> -->

                <div id="Chart" style="width:100%; max-width:1500px; height:500px;"></div>

                <table>
                    <thead>
                        <tr>
                            <th>Tháng</th>
                            <th>Tổng đơn hàng đã bán</th>
                            <th>Tổng số lượng sản phẩm đã bán(Dự kiến)</th>
                            <th>Tỷ lệ hủy đơn hàng</th>
                        </tr>
                    </thead>
                    <?php foreach ($donhang as $dh) : ?>
                        <tbody>
                            <tr>
                                <td><?= $dh['month'] ?></td>
                                <td><?= $dh['total_orders'] ?></td>
                                <td><?= $dh['total_quantity_sold'] ?></td>
                                <td><?= number_format($dh['cancellation_rate'], 2) ?>%</td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>Tổng doanh thu: <?= $doanhThu ?>$</strong></td>
                        </tr>
                    </tfoot>
                </table>


                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Ngày');
                        data.addColumn('number', 'Doanh thu');
                        data.addColumn('number', 'Số lượng đã bán');

                        var sampleData = [
                            <?php
                            foreach ($chartData as $chart) {
                                extract($chart);
                                echo "['$Ngay', $DoanhSo, $SoLuongBan],";
                            }
                            ?>
                        ];

                        data.addRows(sampleData);

                        var options = {
                            title: 'Doanh thu và số lượng đã bán theo ngày',
                            curveType: 'function',
                            legend: {
                                position: 'bottom'
                            },
                            series: {
                                0: {
                                    targetAxisIndex: 0
                                },
                                1: {
                                    targetAxisIndex: 1
                                }
                            },
                            vAxes: {
                                0: {
                                    title: 'Doanh thu (VND)'
                                },
                                1: {
                                    title: 'Số lượng đã bán',
                                    minValue: 0
                                }
                            }
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('Chart'));

                        chart.draw(data, options);

                        // Bảng thông tin chi tiết
                        var tableContainer = document.getElementById('table-container');

                        // Xử lý sự kiện khi chọn một điểm trên biểu đồ
                        google.visualization.events.addListener(chart, 'select', function() {
                            var selectedItem = chart.getSelection()[0];
                            if (selectedItem) {
                                var date = data.getValue(selectedItem.row, 0);
                                var sales = data.getValue(selectedItem.row, 1);
                                var quantity = data.getValue(selectedItem.row, 2);

                                // Cập nhật giá trị cho các phần tử Chi tiết
                                document.getElementById('detail-date').innerText = date;
                                document.getElementById('detail-sales').innerText = sales + '$';
                                document.getElementById('detail-quantity').innerText = quantity;
                            }
                        });
                    }
                </script>





                <br><br>
                <h4>Danh sách sản phẩm bán chạy</h4>
                <div id="myChart" style="max-width:1500px; height:400px"></div>
                <script src="https://www.gstatic.com/charts/loader.js">
                </script>
                <script>
                    google.charts.load('current', {
                        packages: ['corechart']
                    });

                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        const data = google.visualization.arrayToDataTable([
                            ['Tên sản phẩm', 'Số lượng'],
                            <?php
                            foreach ($listsp_bc as $spbc) {
                                extract($spbc);
                                echo "['$ten_sp', $So_luong_da_ban],";
                            }
                            ?>
                        ]);

                        const options = {
                            title: 'Sản phẩm bán chạy'
                        };

                        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                        chart.draw(data, options);
                    }
                </script>
                <!-- <?php
                        if ($current_page > 1 && $total_page > 1) {
                            echo '<li class="pagi"><a href="index.php?act=thongke&page=' . ($current_page - 1) . '">Prev</a> </li>';
                        }
                        for ($i = 1; $i <= $total_page; $i++) {

                            if ($i == $current_page) {
                                echo '<li class="pagi"><a>' . $i . '</a></li>';
                            } else {
                                echo '<li class="pagi"><a href="index.php?act=thongke&page=' . $i . '">' . $i . '</a></li>';
                            }
                        }

                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1) {
                            echo '<li class="pagi"><a href="index.php?act=thongke&page=' . ($current_page + 1) . '">Next</a> </li>';
                        }
                        ?> -->
                <br><br><br><br>
                <br>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>
    </main>
</div>
</div>