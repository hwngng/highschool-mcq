# Giới thiệu mô hình project:
Mô hình MVC kết hợp với 3 lớp (UI -> View + Controller, Business (Bus layer), Data layer (DAL)).
Mục đích là để:
+ dễ dàng làm việc nhóm (vì các layer tách biệt nhau về chức năng)
+ code đơn giản, tách bạch, dễ reuse và dễ suy nghĩ giải quyết bài toán hơn
+ dễ test và fix bug
  
### Giải thích ngắn gọn chức năng các layer:
- View + Controller (layer UI) -> xử lý việc hiển thị và nhận dữ liệu
- Business -> thực hiện validate dữ liệu, chuẩn bị sẵn dữ liệu để phân phối cho DAL lưu vào db
- DAL -> chỉ có nhiệm vụ tương tác dữ liệu với db, ko xử lý logic gì thêm

# Convention
- Branch master chứa code chạy trên production, staging chứa code đang phát triển. Tester test done sẽ có 1 người chịu trách nhiệm đẩy code từ staging vào master. Còn dev sẽ tạo merge request vào staging để tester check
- Quy tắc đặt tên branch: làm issue nào thì lấy ID của issue đấy đặt tên branch là issue/MCQ-&lt;ID&gt;
  Ví dụ t làm issue #35 thì sẽ tách 1 branch issue/MCQ-35 TỪ master, sau đó làm xong t sẽ tạo pull request từ issue/MCQ-35 tới branch staging 
- Khi try catch thì lúc catch phải Log::error
- Các quy ước về việc khởi tạo Bus, DAL ae tham khảo code đã có để làm theo (chỉ khởi tạo khi cần dùng để tránh lãng phí tài nguyên)
- Quy tắc đóng mở ngoặc, viết hoa thường ae tham khảo code đã có để code theo nhưng cũng ko quan trọng vấn đề này

# Các công cụ t sử dụng để việc fix bug nhanh hơn:
- Dùng lệnh
```
php artisan tinker
```
để tương tác với project trên terminal, ae có thể new UserBus()->getAll() để check chẳng hạn, rất tiện
- Check /storage/logs/laravel.log để bắt lỗi
- Sử dụng Laravel debugbar, là 1 công cụ rất tiện lợi, ae cài theo hướng dẫn trong readme của git: https://github.com/barryvdh/laravel-debugbar
- Sử dụng xdebug để debug, hiện tại t ko dùng. ae có thể tham khảo ở đây hoặc trang nào ae muốn: https://viblo.asia/p/debug-request-laravel-voi-xdebug-va-vscode-naQZRWgqlvx
- Sử dụng vscode ae có thể cài đặt extension pack này do t package: https://drive.google.com/file/d/1bf7xUNebqrpe5518Bj8zTiQjIMv-7Etf/view?usp=sharing
(Cài bằng cách trong VSCode ấn Ctrl + Shift + P rồi search install extension from vsix)
- Ngoài ra sử dụng extension PHP Namespace Resolver
dùng để import các class
