<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WongWian วงเวียน Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kTcXn6R2PRW1WlxGSoCzZcOXYrQDpNYK93c7u77YlTQhq1RO8I4NMB8nMyhr7UbjvF5j5zJUd5jRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
    <div class="max-w-md w-full mx-auto bg-white rounded-2xl shadow-lg overflow-hidden mt-6 sm:mt-10">
        <div class="bg-gradient-to-r from-yellow-600 to-orange-500 h-32 relative">
            <img src="ww.png" alt="Profile" class="w-24 h-24 rounded-full border-4 border-white absolute left-1/2 transform -translate-x-1/2 -bottom-12 object-cover">
        </div>
        <div class="p-6 pt-20 text-center">
            <h2 class="text-2xl font-bold mb-2">WongWian วงเวียน</h2>
            <?php
            $rss_url = 'https://anchor.fm/s/13adbb60/podcast/rss';
            $rss = @simplexml_load_file($rss_url);
            if ($rss && isset($rss->channel->item[0])) {
                $latest = $rss->channel->item[0];
                $title = htmlspecialchars($latest->title ?? 'ไม่มีชื่อ');
                $link = htmlspecialchars($latest->link ?? '#');
                $pubDateRaw = $latest->pubDate ?? '';
                $pubDate = $pubDateRaw ? date('d M Y', strtotime($pubDateRaw)) : 'ไม่ทราบวันที่';

                $cover = 'https://placehold.co/600x300.png?text=No+Image';
                $channelImage = $rss->channel->image->url ?? '';
                if ($channelImage) {
                    $cover = (string)$channelImage;
                }
                $namespaces = $latest->getNamespaces(true);
                if (isset($namespaces['media'])) {
                    $media = $latest->children($namespaces['media']);
                    if (isset($media->content)) {
                        $attrs = $media->content->attributes();
                        if (isset($attrs['url'])) {
                            $cover = (string)$attrs['url'];
                        }
                    }
                }

                echo "<div class='mt-6'>
                        <img src='$cover' alt='EP Cover' class='w-full h-48 sm:h-56 object-cover rounded-lg mb-4'>
                        <h3 class='font-semibold text-lg sm:text-xl'>🎙️ EP ล่าสุด: $title</h3>
                        <p class='text-sm text-gray-600 mb-4'>เผยแพร่เมื่อ $pubDate</p>
                        <a href='$link' target='_blank' class='inline-block px-6 py-2 bg-orange-600 text-white rounded-full shadow hover:bg-orange-700 transition w-full sm:w-auto'>ฟังตอนนี้</a>
                      </div>";
            } else {
                echo "<p class='text-red-500 mt-6'>ไม่สามารถโหลด RSS Feed หรือไม่มีข้อมูลตอนล่าสุด</p>";
            }
            ?>
            <div class="flex flex-wrap justify-center gap-3 mt-6">
                <a href="https://anchor.fm/s/13adbb60/podcast/rss" class="text-gray-500 hover:text-orange-600 text-2xl" title="RSS Feed"><i class="fas fa-rss"></i></a>
                <a href="#" class="text-gray-500 hover:text-orange-600 text-2xl" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-500 hover:text-orange-600 text-2xl" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-gray-500 hover:text-orange-600 text-2xl" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="text-gray-500 hover:text-orange-600 text-2xl" title="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-6">
                <a href="https://open.spotify.com/show/6tv8QxF3LAMkjx5HRvcZPY" class="inline-block w-full bg-gradient-to-r from-orange-500 to-orange-700 text-white py-2 rounded-full shadow-lg text-center hover:from-orange-600 hover:to-orange-800 transition transform hover:scale-105">Spotify</a>
                <a href="https://apple.co/46EVzQI" class="inline-block w-full bg-gradient-to-r from-orange-500 to-orange-700 text-white py-2 rounded-full shadow-lg text-center hover:from-orange-600 hover:to-orange-800 transition transform hover:scale-105">Apple</a>
                <a href="https://www.youtube.com/@wong-wian" class="inline-block w-full bg-gradient-to-r from-orange-500 to-orange-700 text-white py-2 rounded-full shadow-lg text-center hover:from-orange-600 hover:to-orange-800 transition transform hover:scale-105">YouTube</a>
                <a href="https://www.tiktok.com/@wongwian.c" class="inline-block w-full bg-gradient-to-r from-orange-500 to-orange-700 text-white py-2 rounded-full shadow-lg text-center hover:from-orange-600 hover:to-orange-800 transition transform hover:scale-105">TikTok</a>
                <a href="https://www.facebook.com/wongwian.ch" class="inline-block w-full bg-gradient-to-r from-orange-500 to-orange-700 text-white py-2 rounded-full shadow-lg text-center hover:from-orange-600 hover:to-orange-800 transition transform hover:scale-105">Facebook</a>
            </div>
        </div>
    </div>
</body>
</html>