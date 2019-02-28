<?php

use Illuminate\Database\Seeder;

class ArticelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('articles')->insert([
        //     'title' => 'Làm Thế Nào Da Không Khô Nẻ Mùa Đông?',
        //     'content' => '1. Giữ ẩm thường xuyên cho da
        //     Đây là một trong những nguyên tắc vàng trong dưỡng da mùa đông. Bạn có thể dùng kem dưỡng ẩm cho da, nên bôi kem sau khi tắm và mỗi sáng sau khi rửa mặt xong. Các loại kem dưỡng ẩm dành cho da của bạn nên có thành phần tự nhiên như mật ong, sữa chua, lô hội, tinh dầu dừa...( xem thêm một số loại kem dưỡng ẩm tại đây )
        //     Bí quyết chăm sóc da ở đây mà BeautyMart muốn mách cho chị em chính là việc duy trì thói quen dưỡng ẩm mỗi ngày với đầy đủ các bước: rửa mặt và làm sạch da bằng nước hoa hồng sau đó mới sử dụng các sản phẩm dưỡng ẩm cho da. ( xem thêm một số loại nước hoa hồng tại đây )
        //     2. Tẩy da chết
        //     Mặc dù thời tiết trở lạnh, da trở lên nhạy cảm hơn việc chăm sóc da một cách nhẹ nhàng rất cần thiết nhưng bạn cũng đừng quên việc tẩy da chết. Da chết chính là thủ phạm ngăn da hấp thu các dưỡng chất. Bạn có thể sử dụng kem tẩy da chết phù hợp và mát-xa nhẹ nhàng để loại bỏ các tế bào chết trên da ( xem thêm một số loại tẩy da chết tại đây ). Hoặc bạn có thể tự chế biến hỗn hợp tẩy da chết tại nhà với các nguyên liệu có sẵn đơn giản như baking soda (bột nở), sữa tươi, cám gạo…
        //     Cách làm: Hòa 4 thìa baking soda với một ít nước ấm để thành hỗn hợp sệt. Sau đó thoa đều hỗn hợp này lên cơ thể trước khi tắm và dùng tay mát-xa trong vòng 15 - 20 phút, rửa lại bằng nước ấm vừa phải.',
        //     'thumbnail' => 'products/upUv8tlUSKaaj6lKE5HF66qxpIXSkklY7YKAxPSn.png',
        //     'description' => 'Để sở hữu một làn da khỏe mạnh, sáng mịn và không còn những nỗi ám ảnh về da khô, thiếu sức sống vào mùa đông không khó như bạn vẫn nghĩ.',
        //     'user_id' => 29,
        //     'hot' => '1',
        //     'status' => '1',
        //     'slug' => str_slug('Làm Thế Nào Da Không Khô Nẻ Mùa Đông?')
        // ]);
        factory(App\Article::class,50)->create();
    }
}
