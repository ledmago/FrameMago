# FrameMago
PHP MVC Framework Starter Pack
___
```post('')``` ile gelen post değerini alabilirsin ve ```if(post('submit'))``` tazı şeylerde olabilir. get için 
```get('parametre')```

```$_url``` değişkeni bir dizidir. site.com/MVO/kayit/yeni ise ```$_url[0] = kayit```, ```$_url[1] = yeni``` olur.

```require view ('index')``` ile view dosyasındaki index.php yi çeker.

controller'e otomatik php dosyası oluşturulursa örnek yeniyazilar.php adres satırı site.com/MVO/yeniyazilar olur.

```session('sehir', 'hamsi')``` ile sehir adlı sessiona hamsi değeri verilir.

```ifsession('sehir')``` ile hem if yapısı içerisinde kontrol edilir, hemde değeri döndürür.

```permalink('Lan Birşeyler Oluyor')``` u adres satırında link yapmak için düzenler > > > lan-birseyler-oluyor

Viewdeki Static headerda Dosyalara ulaşmak için ```asset_url('styles/style.css')``` yazılabilir.


___


# DATABASE CLASS KULLANIMI





**Veri Ekleme Örneği**


```
$query = $db->insert('uyeler')

            ->set(array(

                 'uye_adi' => 'test',

                 'uye_sifre' => 123456,

                 'uye_eposta' => 'test@mail.com'

            ));

   

if ( $query ){

  echo 'Last Insert Id: '.$db->lastId();

}
```


**Veri Güncelleme Örneği**


```
$query = $db->update('uyeler')

            ->where('uye_id', 2)

            ->set(array(

                 'uye_adi' => 'başka ad'

            ));

   

if ( $query ){

  echo 'uye guncellendi.';

}
```
**Veri Silme Örneği**


```
$query = $db->delete('uyeler')

            ->where('uye_id', 2)

            ->done();

   

if ( $query ){

  echo 'veri silindi.';

}

```

**Veri Listeleme Örneği**
```


// select

$query = $db->from('icerikler')

            ->join('uyeler', '%s.uye_id = %s.icerik_uye_id', 'left')

            ->where('icerik_onay', 1)

            ->or_where('icerik_onay', 2)

            ->orderby('icerik_id', 'desc')

            ->groupby('icerik_uye_id')

            ->limit(0, 10)

            ->all();

   

if ( $query ){

  foreach ( $query as $row ){

    print_r($row);

  }

}
```
**Tekli Veri Listeleme Örneği**


```
$row = $db->from('icerikler')

            ->where('icerik_id', 5)

            ->first();

            

print_r($row);

Sayfalama Örneği



// toplam veri

$totalRecord = $db->from('users')

                  ->select('count(user_id) as total')

                  ->total();



// sayfa başına kaç veri gözükecek?

$pageLimit = 4;



// sayfa parametresi? Örn: index.php?page=2 [page = $pageParam]

$pageParam = 'page';



// limit için start ve limit değerleri hesaplanıyor

$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);



// normal sorgumuz

$query = $db->from('uyeler')

            ->orderby('uye_id', 'DESC')

            ->limit($pagination['start'], $pagination['limit'])

            ->all();

            

print_r($query);



// sayfalamayı yazdır

echo $db->showPagination('http://localhost/test/?'.$pageParam.'=[page]');
```
