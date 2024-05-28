-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 15.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resep`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(100) NOT NULL,
  `tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `tipe`) VALUES
(1, 'heavy food'),
(2, 'light food'),
(3, 'Dessert'),
(4, 'snack');

-- --------------------------------------------------------

--
-- Struktur dari tabel `details`
--

CREATE TABLE `details` (
  `id_details` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_difficulty` int(11) DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `deskripsi` varchar(10000) DEFAULT NULL,
  `nama_makanan` varchar(50) DEFAULT NULL,
  `resep` longtext DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `details`
--

INSERT INTO `details` (`id_details`, `id_category`, `id_difficulty`, `durasi`, `deskripsi`, `nama_makanan`, `resep`, `foto`) VALUES
(13, 2, 1, 10, 'A classic omelette is a versatile and quick-to-make dish that\'s perfect for breakfast, brunch, or even a light dinner. Made primarily with beaten eggs, it can be customized with a variety of fillings such as cheese, vegetables, meats, and herbs. The result is a fluffy, flavorful, and satisfying meal that\'s both simple and delicious. The key to a perfect omelette is gentle cooking and proper folding, ensuring a tender texture without overcooking. This dish can be enjoyed on its own or paired with toast, salad, or a side of fresh fruit.', 'Omelette', 'Ingredients:\r\n2 large eggs\r\n2 tablespoons milk or water\r\nSalt and pepper to taste\r\n1 tablespoon butter or oil\r\nOptional fillings:\r\n1/4 cup grated cheese (cheddar, mozzarella, or your favorite)\r\n1/4 cup diced vegetables (such as bell peppers, mushrooms, onions, tomatoes, spinach)\r\n1/4 cup cooked and diced ham, bacon, or sausage\r\nFresh herbs (such as parsley, chives, or dill)\r\nInstructions:\r\nPrepare the Ingredients:\r\n\nIf you are using fillings, prepare them beforehand. Grate the cheese, chop the vegetables, and cook any meats you plan to add.\r\nBeat the Eggs:\r\n\nIn a small bowl, crack the eggs and add the milk or water. Season with a pinch of salt and pepper. Whisk until the mixture is well blended and slightly frothy.\r\nHeat the Pan:\r\n\nHeat a non-stick frying pan over medium heat. Add the butter or oil and let it melt, spreading it evenly over the pan\'s surface.\r\nCook the Eggs:\r\n\nPour the beaten eggs into the pan. Let them cook undisturbed for a few seconds until they start to set around the edges. Using a spatula, gently lift the edges of the omelette and tilt the pan to allow the uncooked eggs to flow to the edges. Continue this process until the eggs are mostly set but still slightly runny on top.\r\nAdd the Fillings:\r\n\nSprinkle your desired fillings over one half of the omelette. Be careful not to overload it to ensure it cooks evenly and can be folded easily.\r\nFold the Omelette:\r\n\nUsing the spatula, carefully fold the other half of the omelette over the fillings. Let it cook for another minute or so until the cheese (if using) is melted and the eggs are fully cooked.\r\nServe:\r\n\nGently slide the omelette onto a plate. Garnish with fresh herbs if desired. Serve immediately with your favorite sides, such as toast, potatoes, or a fresh salad.\r\nTips:\r\nFor a fluffier omelette, use milk instead of water and whisk the eggs vigorously to incorporate more air.\r\nCook the omelette on medium heat to prevent it from browning too quickly and becoming tough.\r\nExperiment with different fillings and herbs to create your own unique omelette variations.\r\nEnjoy your delicious, customizable classic omelette!', 'c6095b15cb9b060d9888fa7fb94dd7e9.jpg'),
(16, 1, 2, 35, 'Nasi Goreng, which translates to \"fried rice\" in Indonesian, is a popular and versatile dish enjoyed throughout Indonesia and other parts of Southeast Asia. This flavorful and aromatic meal typically consists of leftover rice that is stir-fried with a variety of ingredients including vegetables, eggs, and a choice of protein such as chicken, shrimp, or beef. What sets Nasi Goreng apart from other fried rice dishes is the use of key seasonings like sweet soy sauce (kecap manis), garlic, shallots, and chili, which infuse the rice with a unique blend of sweet, savory, and slightly spicy flavors.\r\n\nOften garnished with fried shallots, sliced cucumbers, tomatoes, and a sunny-side-up egg on top, Nasi Goreng is a complete and satisfying meal. It is commonly served with accompaniments like krupuk (crispy crackers) and pickles to add a delightful crunch. Loved for its simplicity and rich taste, Nasi Goreng can be enjoyed at any time of day, making it a beloved comfort food for many. Whether served at street stalls, home kitchens, or high-end restaurants, Nasi Goreng remains a quintessential representation of Indonesian cuisine.', 'Nasi Goreng', 'Sure! Here is a simple and delicious recipe for Nasi Goreng:\r\n\nNasi Goreng Recipe\r\n\n Ingredients:\r\n- 2 cups of cooked rice (preferably chilled overnight)\r\n- 2 tablespoons vegetable oil\r\n- 2 cloves garlic, minced\r\n- 2 shallots, thinly sliced\r\n- 1 red chili, thinly sliced (optional, for extra spice)\r\n- 1 chicken breast or 200g shrimp, diced (optional)\r\n- 1 carrot, finely diced\r\n- 1/2 cup peas or any other preferred vegetables\r\n- 2 eggs, lightly beaten\r\n- 3 tablespoons sweet soy sauce (kecap manis)\r\n- 2 tablespoons soy sauce\r\n- 1 tablespoon fish sauce\r\n- Salt and pepper to taste\r\n\n Garnishes:\r\n- Fried shallots\r\n- Sliced cucumber\r\n- Sliced tomato\r\n- Sunny-side-up egg\r\n- Lime wedges\r\n- Krupuk (crispy crackers)\r\n\nInstructions:\r\n\n1. **Prepare Ingredients**: Make sure all ingredients are prepped before you start cooking as the process goes quickly.\r\n\n2. **Cook the Protein**: In a large wok or frying pan, heat 1 tablespoon of vegetable oil over medium-high heat. Add the diced chicken or shrimp and cook until it\'s fully cooked. Remove and set aside.\r\n\n3. **Cook Aromatics**: Add another tablespoon of vegetable oil to the same pan. Add the minced garlic, sliced shallots, and red chili (if using). Sauté until fragrant, about 1-2 minutes.\r\n\n4. **Add Vegetables**: Add the diced carrot and peas (or any other vegetables you\'re using). Stir-fry for about 2-3 minutes until they start to soften.\r\n\n5. **Add Rice**: Push the vegetables to one side of the pan. Pour in the beaten eggs on the other side and scramble them. Once the eggs are mostly cooked, mix everything together.\r\n\n6. **Season the Rice**: Add the chilled rice to the pan. Break up any clumps and stir-fry everything together. Pour in the sweet soy sauce, soy sauce, and fish sauce. Mix well to ensure the rice is evenly coated with the sauces.\r\n\n7. **Combine and Cook**: Add the cooked chicken or shrimp back into the pan. Stir everything together and cook for another 2-3 minutes until everything is heated through. Season with salt and pepper to taste.\r\n\n8. **Serve**: Spoon the Nasi Goreng onto plates. Top with fried shallots, and place slices of cucumber and tomato on the side. Add a sunny-side-up egg on top of each plate of rice. Serve with lime wedges and krupuk.\r\n\nTips:\r\n- Using day-old rice that has been chilled in the fridge helps to prevent the rice from becoming mushy.\r\n- Feel free to customize this dish with your favorite vegetables or proteins.\r\n- If you can’t find sweet soy sauce (kecap manis), you can substitute it with regular soy sauce mixed with a bit of brown sugar or honey.\r\n\nEnjoy your delicious homemade Nasi Goreng!', '27182.jpg'),
(17, 2, 3, 150, 'Bakso is a popular Indonesian dish, consisting of meatballs served in a flavorful broth, often accompanied by noodles, vegetables, and various condiments. The meatballs are typically made from a mixture of ground meat (such as beef, chicken, or fish) mixed with tapioca flour or other binding agents, seasoned with garlic, shallots, and various spices to enhance the taste. \r\n\nThe broth, which forms the base of the dish, is often made by simmering bones and spices for hours to develop a rich and savory flavor. It\'s commonly seasoned with soy sauce, salt, pepper, and other seasonings to taste. Bakso is often served with noodles, such as rice noodles or egg noodles, and a variety of toppings such as fried shallots, chopped scallions, celery, and chili sauce, allowing for customization according to individual preferences.\r\n\nThis beloved Indonesian comfort food can be found in street food stalls, warungs (small eateries), and restaurants throughout the country. It\'s a hearty and satisfying dish enjoyed by people of all ages, whether as a quick snack or a filling meal.', 'Bakso', 'Ingredients:\r\n500 grams of ground beef (or a combination of beef and chicken)\r\n100 grams of tapioca flour or cornstarch\r\n2 cloves of garlic, minced\r\n1 teaspoon of salt\r\n1/2 teaspoon of pepper\r\n1/2 teaspoon of baking powder\r\n1/2 teaspoon of sugar\r\nIce cubes (optional, for making the meat mixture cold)\r\n\nInstructions:\r\nIn a large mixing bowl, combine the ground beef, minced garlic, salt, pepper, baking powder, and sugar. Mix well until all the ingredients are evenly distributed.\r\nGradually add the tapioca flour or cornstarch to the meat mixture, mixing continuously until the mixture becomes sticky and slightly elastic.\r\nIf the mixture feels warm, you can add a few ice cubes to help keep it cold. Continue mixing until the ice cubes melt and the mixture becomes cold again.\r\nOnce the meat mixture is cold, take a small portion of it and shape it into a ball using your hands. You can wet your hands with water to prevent the mixture from sticking.\r\nRepeat the process until all the meat mixture has been used up, forming meatballs of your desired size.\r\nBring a large pot of water to a boil. Carefully drop the meatballs into the boiling water, making sure not to overcrowd the pot.\r\nLet the meatballs cook in the boiling water until they float to the surface, indicating that they are cooked through. This usually takes about 10-15 minutes, depending on the size of the meatballs.\r\nOnce the meatballs are cooked, remove them from the water using a slotted spoon and set them aside.\r\nServe the meatballs hot in a bowl of clear broth (made from boiling bones and spices) along with noodles, vegetables, and other condiments of your choice.\r\n\nEnjoy your homemade Indonesian meatballs!\r\n', 'bakso.jpg'),
(18, 1, 2, 90, 'Mie ayam adalah salah satu hidangan populer di Indonesia yang terdiri dari mie pangsit yang dihidangkan bersama potongan daging ayam, irisan sayuran segar seperti sawi, daun bawang, dan kadang-kadang ditaburi dengan bawang goreng. \r\n\nMie ayam biasanya disajikan dalam mangkuk besar berisi kaldu ayam yang gurih dan lezat. Kaldu ini sering kali diperkaya dengan bumbu-bumbu seperti bawang putih, jahe, dan merica untuk memberikan rasa yang kaya dan hangat.\r\n\nProses pembuatannya dimulai dengan merebus mie pangsit hingga matang. Kemudian, daging ayam direbus dan dipotong menjadi irisan kecil. Setelah itu, mie pangsit, potongan daging ayam, dan sayuran direndam dalam mangkuk kaldu panas. Tambahan bawang goreng memberikan tambahan rasa dan tekstur yang renyah.\r\n\nMie ayam sering kali disajikan dengan saus sambal atau kecap manis sebagai tambahan untuk menambah cita rasa pedas atau manis sesuai selera. Hidangan ini merupakan pilihan makan siang atau makan malam yang populer di warung-warung makan dan restoran di seluruh Indonesia, karena kesederhanaannya dan kenikmatan rasanya.', 'Mie Ayam', 'Bahan-bahan:\r\n250 gram mie pangsit (bisa diganti dengan mie telur atau mie lainnya)\r\n200 gram daging ayam, potong dadu kecil\r\n2 batang daun bawang, iris halus\r\n2 siung bawang putih, cincang halus\r\n1 sendok makan minyak sayur\r\nGaram secukupnya\r\nMerica secukupnya\r\nUntuk Kaldu Ayam:\r\n1 liter air\r\n2 potong dada ayam (atau tulang ayam)\r\n2 siung bawang putih, cincang halus\r\n1 ruas jahe, memarkan\r\nGaram secukupnya\r\nMerica secukupnya\r\nBumbu Pelengkap (opsional):\r\nKecap manis\r\nSambal\r\nBawang goreng\r\nIrisan daun bawang\r\nSedikit minyak wijen\r\n\nInstruksi:\r\nDidihkan air dalam panci besar. Masukkan potongan dada ayam (atau tulang ayam), bawang putih, jahe, garam, dan merica.\r\nBiarkan kaldu mendidih dengan api kecil selama sekitar 30-40 menit hingga mendapatkan rasa yang kaya. Saring kaldu dan sisihkan.\r\n\nMenyiapkan Mie dan Daging Ayam:\r\nRebus mie pangsit sesuai petunjuk di kemasan. Tiriskan dan sisihkan.\r\nPanaskan minyak dalam wajan. Tumis bawang putih hingga harum, kemudian tambahkan potongan daging ayam. Tumis hingga ayam matang dan berwarna kecokelatan.\r\nTambahkan garam dan merica secukupnya untuk mengatur rasa. Setelah matang, angkat dan sisihkan.\r\n\nPenyajian:\r\nAmbil mangkuk saji, masukkan mie pangsit, potongan daging ayam, dan daun bawang iris.\r\nSiram dengan kaldu ayam panas.\r\nTambahkan bumbu pelengkap sesuai selera seperti kecap manis, sambal, bawang goreng, irisan daun bawang, dan sedikit minyak wijen.\r\nMie ayam siap disajikan.\r\n\nSelamat menikmati mie ayam yang lezat dan hangat!', 'mie_ayam.jpg'),
(19, 2, 1, 45, 'Seblak adalah hidangan Indonesia yang berasal dari Bandung, Jawa Barat, yang terkenal karena rasa pedas dan gurihnya. Hidangan ini terbuat dari berbagai macam bahan, seperti kerupuk, mie instan, sayuran, dan daging atau seafood, yang kemudian dimasak bersamaan dengan bumbu khas yang kuat.\r\n\nProses pembuatan seblak dimulai dengan merebus kerupuk dan mie instan hingga matang. Kemudian, bahan-bahan seperti kol, wortel, tauge, dan potongan daging atau seafood ditambahkan ke dalam panci. \r\n\nBumbu khas seblak terdiri dari campuran bumbu rempah-rempah, seperti cabai, bawang putih, bawang merah, jahe, dan daun jeruk, yang dihaluskan atau dicincang halus. Bumbu ini kemudian dimasukkan ke dalam panci bersama dengan bahan lainnya untuk memberikan rasa pedas, gurih, dan aroma yang khas.\r\n\nSetelah semua bahan dimasak dan bumbu meresap, seblak siap disajikan. Hidangan ini sering kali disajikan panas-panas dan biasanya disantap sebagai makanan ringan atau jajanan jalanan. Seblak memiliki cita rasa yang unik dan memikat, menjadikannya salah satu makanan favorit di Indonesia, terutama bagi pecinta makanan pedas.', 'Seblak', 'Bahan Utama:\r\n100 gram kerupuk (kerupuk aci atau kerupuk pangsit)\r\n1 bungkus mie instan (tanpa bumbu)\r\n\nBahan Tambahan (opsional, sesuai selera):\r\n100 gram daging ayam/giling/ayam suwir/ayam fillet/udang/cumi (potong kecil-kecil)\r\n1/2 cup kol, iris tipis\r\n1/2 cup wortel, potong korek api\r\n1/2 cup tauge\r\n2 siung bawang putih, cincang halus\r\n2 batang daun bawang, iris tipis\r\n2-3 buah cabai merah, iris tipis (sesuai selera)\r\n2-3 buah cabai hijau, iris tipis (sesuai selera)\r\nBumbu Halus (sesuai selera):\r\n2-3 cabai rawit (opsional, sesuai selera)\r\n3 siung bawang putih\r\n2 butir kemiri (sangrai)\r\n1 ruas jahe\r\nGaram secukupnya\r\nGula secukupnya\r\nMerica secukupnya\r\n\nCara Memasak:\r\nRebus kerupuk dalam air mendidih hingga lunak. Tiriskan dan sisihkan.\r\nRebus mie instan dalam air mendidih hingga matang. Tiriskan dan sisihkan.\r\nJika menggunakan daging/ayam/udang/cumi, tumis bawang putih hingga harum, tambahkan daging/ayam/udang/cumi, masak hingga matang. Sisihkan.\r\nJika menggunakan sayuran, tumis bawang putih hingga harum, tambahkan sayuran (kol, wortel, tauge), masak hingga layu. Sisihkan.\r\nHaluskan cabai rawit, bawang putih, kemiri, dan jahe. Tambahkan garam, gula, dan merica secukupnya. Aduk rata.\r\nPanaskan sedikit minyak dalam wajan. Tumis bumbu halus hingga harum.\r\nTambahkan kerupuk yang sudah direbus dan mie instan. Aduk rata.\r\nMasukkan daging/ayam/udang/cumi yang sudah dimasak dan sayuran yang sudah ditumis. Aduk rata hingga semua bahan tercampur dan matang.\r\nKoreksi rasa sesuai selera dengan menambahkan garam, gula, atau merica jika diperlukan.\r\n\nPenyajian:\r\nAngkat seblak dan sajikan dalam mangkuk.\r\nTaburi dengan irisan daun bawang dan cabai rawit (jika suka).\r\nSeblak siap disajikan selagi hangat.\r\n\nSelamat mencoba membuat Seblak dan menikmati hidangan pedas gurih khas Indonesia ini!', 'seblak.jpg'),
(20, 3, 2, 45, 'Martabak manis adalah salah satu makanan ringan yang sangat populer di Indonesia. Hidangan ini terdiri dari adonan tebal yang dibuat dari campuran tepung terigu, telur, ragi, gula, susu, dan santan. Adonan tersebut kemudian dituangkan ke dalam wajan datar dan dipanggang hingga matang dan berwarna kecokelatan.\r\n\nSetelah matang, martabak manis biasanya dilipat menjadi dua bagian dan diisi dengan berbagai macam pilihan topping, seperti cokelat meses, keju parut, kacang, susu kental manis, atau selai. Martabak manis kemudian dipotong menjadi potongan-potongan kecil sebelum disajikan.\r\n\nRasa dari martabak manis adalah kombinasi dari manisnya adonan yang lembut dan gurihnya isian di dalamnya. Teksturnya yang lembut di bagian dalam dan renyah di bagian luar membuatnya menjadi camilan yang sangat disukai oleh orang-orang dari segala usia.\r\n\nMartabak manis sering dijumpai di warung-warung pinggir jalan, pasar malam, atau toko kue di seluruh Indonesia. Hidangan ini juga sering disajikan sebagai hidangan penutup di berbagai acara atau sebagai camilan yang menggugah selera di waktu senggang. Dengan berbagai variasi isian dan topping yang bisa disesuaikan dengan selera, martabak manis menjadi salah satu camilan favorit yang selalu dinantikan oleh banyak orang.', 'Martabak ', ' Bahan-bahan:\r\n\nBagian Adonan:\r\n- 250 gram tepung terigu\r\n- 1 butir telur\r\n- 400 ml air\r\n- 1/2 sendok teh ragi instan\r\n- 50 gram gula pasir\r\n- 1/4 sendok teh garam\r\n- 50 ml santan kental\r\n\n Bagian Isian (opsional, bisa disesuaikan sesuai selera):\r\n- Selai cokelat, keju parut, kacang tanah cincang, meses cokelat, atau susu kental manis\r\n\nPelapis dan Pengoles:\r\n- Mentega atau margarin secukupnya, untuk melapisi wajan\r\n- Minyak goreng secukupnya, untuk mengoles permukaan martabak\r\n\n Instruksi:\r\n1. Persiapan Adonan:\r\n   - Campurkan tepung terigu, ragi instan, gula pasir, dan garam dalam mangkuk besar. Aduk rata.\r\n   - Tambahkan telur dan santan kental. Aduk-aduk hingga tercampur rata.\r\n   - Tuangkan air sedikit demi sedikit sambil terus diaduk hingga membentuk adonan yang halus dan tanpa gumpalan. Pastikan adonan memiliki konsistensi yang cukup encer. Biarkan adonan istirahat selama sekitar 30-60 menit agar ragi aktif.\r\n\n2. Memanggang Martabak:\r\n   - Panaskan wajan datar anti lengket atau wajan martabak dengan api sedang.\r\n   - Oles permukaan wajan dengan mentega atau margarin.\r\n   - Tuangkan adonan ke wajan dengan ukuran yang sesuai dengan keinginan Anda. Ratakan adonan dengan spatula hingga membentuk lapisan yang tipis.\r\n   - Tutup wajan dan biarkan adonan matang hingga bagian bawahnya berwarna kecokelatan dan bagian atasnya mengembang. Pastikan adonan matang secara merata.\r\n\n3. Penyajian:\r\n   - Setelah bagian bawah matang, tambahkan isian sesuai selera di satu sisi adonan.\r\n   - Lipat adonan menjadi dua bagian sehingga isian tersembunyi di dalamnya.\r\n   - Panggang martabak hingga matang dan berwarna kecokelatan di kedua sisi.\r\n   - Angkat martabak dan letakkan di atas piring saji.\r\n   - Oles permukaan martabak dengan minyak goreng untuk memberikan kilauan yang menarik.\r\n   - Potong martabak menjadi potongan-potongan sesuai selera.\r\n   - Martabak manis siap disajikan hangat-hangat.\r\n\nSelamat mencoba membuat martabak manis dan menikmati camilan yang lezat ini!', 'martabak manis.jpg'),
(21, 4, 1, 15, 'Tahu goreng adalah makanan ringan yang terbuat dari tahu yang digoreng hingga berkulit renyah di luar namun tetap lembut di dalamnya. Makanan ini merupakan salah satu camilan populer di Indonesia yang mudah ditemukan di warung-warung makan, penjaja kaki lima, dan pasar tradisional.\r\n\nProses pembuatan tahu goreng dimulai dengan memotong tahu menjadi potongan-potongan kecil atau irisan tipis. Potongan tahu kemudian direndam dalam bumbu yang terdiri dari campuran bumbu rempah-rempah seperti bawang putih, ketumbar, kunyit, dan garam. Setelah direndam, tahu kemudian digoreng dalam minyak panas hingga berwarna kecokelatan dan berkulit renyah di luar.\r\n\nHasilnya adalah tahu yang memiliki tekstur renyah di luar dan lembut di dalamnya. Rasa gurih dan rempah dari bumbu rendaman menambah cita rasa yang khas pada tahu goreng. Makanan ini sering disajikan dengan saus sambal, saus kacang, atau kecap manis sebagai pelengkap, yang menambahkan rasa pedas, manis, atau gurih sesuai selera.\r\n\nTahu goreng sering dijadikan alternatif camilan yang menyenangkan dan bergizi bagi yang sedang diet vegetarian atau menghindari makanan berlemak berat. Dengan tekstur yang renyah di luar dan lembut di dalam, serta citarasa yang khas dan beragam, tahu goreng merupakan salah satu camilan yang disukai oleh banyak orang di Indonesia dan di seluruh dunia.', 'Tahu Goreng', 'Bahan-bahan:\r\n1 blok tahu putih, potong menjadi potongan-potongan persegi atau irisan tipis\r\nMinyak goreng secukupnya, untuk menggoreng\r\nBumbu rendaman (opsional):\r\n2 siung bawang putih, haluskan atau cincang halus\r\n1 sendok teh ketumbar bubuk\r\n1/2 sendok teh kunyit bubuk\r\nGaram secukupnya\r\nMerica secukupnya\r\n\nCara membuat:\r\nJika menggunakan bumbu rendaman, campurkan bawang putih, ketumbar bubuk, kunyit bubuk, garam, dan merica dalam sebuah mangkuk.\r\nRendam potongan tahu dalam campuran bumbu tersebut, pastikan semua bagian tahu terendam dengan merata.\r\n\nPenggorengan:\r\nPanaskan minyak goreng dalam wajan dengan api sedang hingga panas.\r\nSetelah minyak panas, masukkan potongan tahu secara perlahan ke dalam minyak panas. Pastikan tahu tidak bertumpuk agar proses penggorengan merata.\r\nGoreng tahu hingga kedua sisi berwarna kecokelatan dan berkulit renyah. Ini mungkin memakan waktu sekitar 5-7 menit untuk setiap sisi, tergantung pada intensitas panas dan ketebalan tahu.\r\n\nPenyajian:\r\nAngkat tahu goreng dari minyak goreng dan tiriskan di atas kertas minyak atau tisu dapur untuk menyerap kelebihan minyak.\r\nTahu goreng siap disajikan. Biasanya disajikan hangat-hangat sebagai camilan atau sebagai pelengkap hidangan lain.\r\n\nSelamat mencoba membuat tahu goreng! Anda bisa menyesuaikan resep ini dengan bumbu-bumbu dan varian rasa sesuai selera.', 'fried-tofu-healthy-food.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `difficulty`
--

CREATE TABLE `difficulty` (
  `id_difficulty` int(11) NOT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `difficulty`
--

INSERT INTO `difficulty` (`id_difficulty`, `level`) VALUES
(1, 'Easy'),
(2, 'Medium'),
(3, 'Hard');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `password`) VALUES
(1, 'reyy', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id_details`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_difficulty` (`id_difficulty`);

--
-- Indeks untuk tabel `difficulty`
--
ALTER TABLE `difficulty`
  ADD PRIMARY KEY (`id_difficulty`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `details`
--
ALTER TABLE `details`
  MODIFY `id_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `difficulty`
--
ALTER TABLE `difficulty`
  MODIFY `id_difficulty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `details_ibfk_2` FOREIGN KEY (`id_difficulty`) REFERENCES `difficulty` (`id_difficulty`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
