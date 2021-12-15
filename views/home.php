<h1 class="mb-4">Documentation</h1>

<div class="mb-4">
    <h4>Membuat Controller</h4>
    <ol>
        <li>Buat file controller pada folder controllers</li>
        <li>
            Buat class sesuai dengan nama controller dan extends Controller, kemudian buat function untuk ekskusi kode. Contoh pembuatan controller adalah seperti berikut.
            <br>
            <div class="border border-white px-3 py-2 mb-3">
                <code>
                    namespace app\controllers;
                    <br>
                    use ti2018b\phpmvc\Controller;
                    <br>
                    class TestController extends Controller <br>
                    {<br>
                    &nbsp; public function index() <br>
                    &nbsp; { <br>
                    &nbsp;&nbsp;// Eksekusi code di sini <br>
                    &nbsp; }<br>
                    }
                </code>
            </div>
        </li>
    </ol>
</div>


<div class="mb-4">
    <h4>Membuat Route</h4>
    <ol>
        <li>Buka index.php di dalam folder public.</li>
        <li>
            Tambahkan route baru dengan baris code seperti berikut. Dan pastikan sudah memanggil controller dengan use.
            <br>
            <div class="border border-white px-3 py-2 mb-3">
                <code>
                    use app\controllers\TestController;<br>
                    &#8230;<br>
                    &#8230;<br>
                    // '/test' => route baru <br>
                    // TestController => nama class controller<br>
                    // 'index' => function yang dieksekusi di dalam class controller<br>
                    $app->router->get('/test', [TestController::class, 'index']);<br>
                </code>
            </div>
        </li>
    </ol>
</div>

<div class="mb-4">
    <h4>Membuat View</h4>
    <ol>
        <li>Tambahkan file view baru pada folder views dengan format file.php</li>
        <li>Buat view baru di dalam file yg sudah ditambahkan.</li>
        <li>Ubah main.php di dalam folder layouts untuk mengubah layout tampilan. </li>
    </ol>
</div>

<div class="mb-4">
    <h4>Mengakses View</h4>
    <ol>
        <li>
            Untuk mengakses view pergi ke sebuah controller yg akan dipakai, deklarasikan code seperti berikut pada fungsi di dalam controller yg dimaksud. <br>
            <div class="border border-white px-3 py-2 mb-3">
                <code>
                    class TestController extends Controller<br>
                    {<br>
                    &nbsp;public function index()<br>
                    &nbsp;{<br>
                    &nbsp;&nbsp;// Eksekusi code di sini<br>
                    &nbsp;&nbsp;return $this->render('test');<br>
                    &nbsp;}<br>
                    }
                </code>
            </div>
        </li>
        <li>
            Untuk mengakses mengirimkan data ke dalam view inisialisasikan varibel array $params dan tambahkan array assosiatif dengan format ‘key’ => ‘value’ dan akses di dalam function render seperti berikut.
            <div class="border border-white px-3 py-2 mb-3">
                <code>
                    class TestController extends Controller<br>
                    {<br>
                    &nbsp;public function index()<br>
                    &nbsp;{<br>
                    &nbsp;&nbsp;$params = [<br>
                    &nbsp;&nbsp;&nbsp;'name' => &quot;Mohammad Aris Saputra&quot;<br>
                    &nbsp;&nbsp;];<br>
                    <br>
                    &nbsp;&nbsp;// Eksekusi code di sini<br>
                    &nbsp;&nbsp;return $this->render('test', $params);<br>
                    &nbsp;}<br>
                    }<br>

                </code>
            </div>
        </li>
        <li>
            Dan akses di dalam view dengan sintaks php echo $name .
        </li>
    </ol>
</div>

<div class="mb-4">
    <h4>Membuat Migrasi</h4>
    <ol>
        <li>Buat file baru pada folder “migrations” dan beri nama file dengan format “m0003_nama_file_migrasi.php”, 003 adalah urutan file migrasi tambahkan atau kurangi sesuai dengan nomer file migrasi sebelumnya.</li>
        <li>
            Buat class sesuai nama file migrasi dan buat dua funtction up dan down. <br>
            <div class="border border-white px-3 py-2 mb-3">
                <code>
                    <br>
                    use ti2018b\phpmvc\Application;<br>
                    <br>
                    class m0003_data<br>
                    {<br>
                    &nbsp;public function up()<br>
                    &nbsp;{<br>
                    &nbsp;}<br>
                    <br>
                    &nbsp;public function down()<br>
                    &nbsp;{<br>
                    &nbsp;}<br>
                    }<br>
                </code>
            </div>
        </li>

        <li>
            Pada function up inisialisasikan variabel $db dan $SQL sebagai berikut. <br>
            <div class="border border-white px-3 py-2 mb-3">
                <code>
                    public function up()<br>
                    {<br>
                    &nbsp;$db = Application::$app->db;<br>
                    &nbsp;$SQL = &quot;CREATE TABLE data_user(<br>
                    &nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;username VARCHAR(255) NOT NULL,<br>
                    &nbsp;&nbsp;nim VARCHAR(255) NOT NULL,<br>
                    &nbsp;&nbsp;created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP<br>
                    &nbsp;&nbsp;) ENGINE=INNODB;&quot;;<br>
                    &nbsp;$db->pdo->exec($SQL);<br>
                    }<br>
                </code>
            </div>
            Variabel $SQL digunakan untuk menyimpan query pembuatan tabel, field sesuaikan dengan kebutuhan. Kemudian eksekusi query dengan $db->pdo->exec().
        </li>

        <li>
            Pada function down inisialisasi varibel $db dan $SQL sebagai berikut. <br>
            <div class="border border-white px-3 py-2 mb-3">
                <code>
                    public function down()<br>
                    {<br>
                    &nbsp;$db = Application::$app->db;<br>
                    &nbsp;$SQL = &quot;DROP TABLE data_user;&quot;;<br>
                    &nbsp;$db->pdo->exec($SQL);<br>
                    }
                </code>
            </div>
        </li>
        <li>
            Dan jalankan perintah php migrations.php pada terminal.
        </li>
    </ol>
</div>

<div class="mb-4">
    <h4>Membuat Model</h4>
    <ol>
        <li>
            Buka folder model dan tambahkan file model baru. Kemudian buat class sesuai nama file dan extends Model, lalu inisialisasikan nama tabel dan primary key seperti berikut. <br>
            <div class="border border-white px-3 py-2 mb-3">
                <code>
                    namespace app\models;<br>
                    <br>
                    use ti2018b\phpmvc\Model;<br>
                    <br>
                    class ContactForm extends Model<br>
                    {<br>
                    &nbsp;public function tableName(): string<br>
                    &nbsp;{<br>
                    &nbsp;&nbsp;return 'data_user';<br>
                    &nbsp;}<br>
                    <br>
                    &nbsp;public function primaryKey(): string<br>
                    &nbsp;{<br>
                    &nbsp;&nbsp;return 'id';<br>
                    &nbsp;}<br>
                    }<br>

                </code>
            </div>
        </li>
    </ol>
</div>