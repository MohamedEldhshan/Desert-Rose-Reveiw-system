<?php

namespace Database\Seeders;

use App\Models\Herb;
use Illuminate\Database\Seeder;

class HerbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $herbs = [
            [
                'name_en' => 'Black Seed (Nigella Sativa)',
                'name_ar' => 'حبة البركة',
                'slug' => 'black-seed-nigella-sativa',
                'description_en' => 'Black seed, also known as black cumin, has been used for thousands of years in traditional medicine. It\'s native to Southwest Asia and is one of the most powerful healing herbs known.',
                'description_ar' => 'حبة البركة، المعروفة أيضاً بالكمون الأسود، استخدمت لآلاف السنين في الطب التقليدي. هي أصلية في جنوب غرب آسيا وتعتبر من أقوى الأعشاب العلاجية.',
                'benefits_en' => '• Boosts immune system naturally
• Anti-inflammatory properties
• Helps with respiratory issues
• Supports digestive health
• Regulates blood sugar levels
• Improves skin conditions
• Promotes hair growth
• Reduces allergies',
                'benefits_ar' => '• تعزز جهاز المناعة بشكل طبيعي
• خصائص مضادة للالتهابات
• تساعد في مشاكل الجهاز التنفسي
• تدعم صحة الجهاز الهضمي
• تنظم مستويات السكر في الدم
• تحسن حالات الجلد
• تعزز نمو الشعر
• تقلل الحساسية',
                'usage_en' => '• Take 1 teaspoon of oil daily
• Mix with honey for better taste
• Add to warm water or tea
• Apply topically for skin issues
• Use in cooking as a spice',
                'usage_ar' => '• تناول ملعقة صغيرة من الزيت يومياً
• امزج مع العسل لتحسين الطعم
• أضف إلى الماء الدافئ أو الشاي
• ضع موضعياً لمشاكل الجلد
• استخدم في الطبخ كتوابل',
                'image' => 'https://images.unsplash.com/photo-1596040033229-a9821ebd058d?w=500&h=500&fit=crop&bg=white',
                'category' => 'herbs',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name_en' => 'Hibiscus (Karkade)',
                'name_ar' => 'الكركديه',
                'slug' => 'hibiscus-karkade',
                'description_en' => 'Hibiscus is a beautiful flower that produces a deep red tea with a tart flavor. It\'s rich in antioxidants and has been consumed for centuries in Egypt and other parts of the Middle East.',
                'description_ar' => 'الكركديه هو زهرة جميلة تنتج شاي أحمر غامق بطعم حامض. هو غني بمضادات الأكسدة وتم استهلاكه لقرون في مصر وأجزاء أخرى من الشرق الأوسط.',
                'benefits_en' => '• Lowers blood pressure
• Rich in Vitamin C
• Supports liver health
• Aids in weight loss
• Improves digestion
• Boosts immune system
• Reduces cholesterol levels
• Anti-aging properties',
                'benefits_ar' => '• يخفض ضغط الدم
• غني بفيتامين C
• يدعم صحة الكبد
• يساعد في فقدان الوزن
• يحسن الهضم
• يعزز جهاز المناعة
• يقلل مستويات الكوليسترول
• خصائص anti-aging',
                'usage_en' => '• Steep dried flowers in hot water
• Drink hot or cold
• Add honey or sugar to taste
• Can be used as natural food coloring
• Mix with other herbs for blends',
                'usage_ar' => '• انقع الزهور المجففة في الماء الساخن
• اشرب ساخناً أو بارداً
• أضف العسل أو السكر حسب الرغبة
• يمكن استخدامه كملون طبيعي للطعام
• امزج مع أعشاب أخرى للخلطات',
                'image' => 'https://images.unsplash.com/photo-1515586000433-45406d8e6662?w=500&h=500&fit=crop&bg=white',
                'category' => 'herbs',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name_en' => 'Chamomile',
                'name_ar' => 'البابونج',
                'slug' => 'chamomile',
                'description_en' => 'Chamomile is one of the oldest, most widely used and well-documented medicinal plants in the world. It has a gentle, soothing aroma and is famous for its calming effects.',
                'description_ar' => 'البابونج هو واحد من أقدم وأكثر النباتات الطبية استخداماً وتوثيقاً في العالم. له رائحة لطيفة مهدئة ومشهور بتأثيراته المهدئة.',
                'benefits_en' => '• Promotes better sleep
• Reduces anxiety and stress
• Soothes stomach issues
• Anti-inflammatory properties
• Supports skin health
• Relieves menstrual pain
• Boosts immune system
• Aids in digestion',
                'benefits_ar' => '• يعزز نوم أفضل
• يقلل القلق والتوتر
• يهدئ مشاكل المعدة
• خصائص مضادة للالتهابات
• يدعم صحة الجلد
• يخفف آلام الدورة الشهرية
• يعزز جهاز المناعة
• يساعد في الهضم',
                'usage_en' => '• Steep flowers in boiling water for 5-10 minutes
• Drink before bed for better sleep
• Add lemon or honey for flavor
• Use as a face steam for skin
• Apply cooled tea as a skin toner',
                'usage_ar' => '• انقع الزهور في الماء المغلي لمدة 5-10 دقائق
• اشرب قبل النوم لنوم أفضل
• أضف الليمون أو العسل للنكهة
• استخدم كبخار للوجه للجلد
• ضع الشاي المبرد كتونر للبشرة',
                'image' => 'https://images.unsplash.com/photo-1532336414038-cf19250c5757?w=500&h=500&fit=crop&bg=white',
                'category' => 'herbs',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name_en' => 'Anise',
                'name_ar' => 'الينسون',
                'slug' => 'anise',
                'description_en' => 'Anise is a flowering plant native to the Mediterranean region and Southwest Asia. It has a sweet, aromatic flavor similar to licorice and has been used since ancient times.',
                'description_ar' => 'الينسون هو نبات مزهر أصلي في منطقة البحر المتوسط وجنوب غرب آسيا. له نكهة حلوة عطرية تشبه عرق السوس واستخدم منذ العصور القديمة.',
                'benefits_en' => '• Relieves digestive issues
• Reduces bloating and gas
• Supports respiratory health
• Has antibacterial properties
• Improves milk production in nursing mothers
• Reduces inflammation
• Promotes better sleep
• Freshens breath',
                'benefits_ar' => '• يخفف مشاكل الهضم
• يقلل الانتفاخ والغازات
• يدعم صحة الجهاز التنفسي
• له خصائص مضادة للبكتيريا
• يحسن إنتاج الحليب للمرضعات
• يقلل الالتهابات
• يعزز نوم أفضل
• ينعش النفس',
                'usage_en' => '• Steep seeds in hot water for tea
• Chew seeds after meals for digestion
• Add to baked goods
• Use in cooking for flavor
• Mix with honey for cough relief',
                'usage_ar' => '• انقع البذور في الماء الساخن للشاي
• امضغ البذور بعد الوجبات للهضم
• أضف إلى المخبوزات
• استخدم في الطبخ للنكهة
• امزج مع العسل لتخفيف السعال',
                'image' => 'https://images.unsplash.com/photo-1509358271058-aedd22b89c91?w=500&h=500&fit=crop&bg=white',
                'category' => 'herbs',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name_en' => 'Cumin',
                'name_ar' => 'الكمون',
                'slug' => 'cumin',
                'description_en' => 'Cumin is a flowering plant native to the eastern Mediterranean and South Asia. Its dried seeds are used as a spice in cuisines around the world, especially in Middle Eastern, Indian, and Mexican dishes.',
                'description_ar' => 'الكمون هو نبات مزهر أصلي في شرق البحر المتوسط وجنوب آسيا. بذوره المجففة تستخدم كتوابل في مطابخ العالم، خاصة في الأطباق الشرق أوسطية والهندية والمكسيكية.',
                'benefits_en' => '• Aids in digestion
• Rich in iron
• Boosts immune system
• Has anti-cancer properties
• Regulates blood sugar
• Improves respiratory health
• Reduces inflammation
• Supports weight loss',
                'benefits_ar' => '• يساعد في الهضم
• غني بالحديد
• يعزز جهاز المناعة
• له خصائص anti-cancer
• ينظم سكر الدم
• يحسن صحة الجهاز التنفسي
• يقلل الالتهابات
• يدعم فقدان الوزن',
                'usage_en' => '• Use as a spice in cooking
• Add to soups and stews
• Mix with yogurt for digestion
• Brew as tea
• Sprinkle over roasted vegetables',
                'usage_ar' => '• استخدم كتوابل في الطبخ
• أضف إلى الشوربات واليخنات
• امزج مع الزبادي للهضم
• اصنع كشاي
• رش على الخضروات المحمصة',
                'image' => 'https://images.unsplash.com/photo-1596040033229-a9821ebd058d?w=500&h=500&fit=crop&bg=white',
                'category' => 'spices',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name_en' => 'Fennel',
                'name_ar' => 'الشمر',
                'slug' => 'fennel',
                'description_en' => 'Fennel is a highly aromatic and flavorful herb with culinary and medicinal uses. It has a sweet, anise-like flavor and is used in many traditional dishes and remedies.',
                'description_ar' => 'الشمر هو عشب عطري جداً ولذيذ له استخدامات طبية وطهوية. له نكهة حلوة تشبه اليانسون ويستخدم في العديد من الأطباق والعلاجات التقليدية.',
                'benefits_en' => '• Improves digestion
• Reduces bloating
• Freshens breath
• Supports eye health
• Regulates blood pressure
• Aids in weight loss
• Has diuretic properties
• Relieves menstrual pain',
                'benefits_ar' => '• يحسن الهضم
• يقلل الانتفاخ
• ينعش النفس
• يدعم صحة العين
• ينظم ضغط الدم
• يساعد في فقدان الوزن
• له خصائص مدرية للبول
• يخفف آلام الدورة الشهرية',
                'usage_en' => '• Chew seeds after meals
• Brew as tea
• Add to salads
• Use in cooking
• Mix with other herbs',
                'usage_ar' => '• امضغ البذور بعد الوجبات
• اصنع كشاي
• أضف إلى السلطات
• استخدم في الطبخ
• امزج مع أعشاب أخرى',
                'image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=500&h=500&fit=crop&bg=white',
                'category' => 'herbs',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name_en' => 'Ginger',
                'name_ar' => 'الزنجبيل',
                'slug' => 'ginger',
                'description_en' => 'Ginger is a flowering plant whose rhizome (ginger root) is widely used as a spice and in traditional medicine. It has a distinctive spicy flavor and numerous health benefits.',
                'description_ar' => 'الزنجبيل هو نبات مزهر يستخدم جذوره على نطاق واسع كتوابل وفي الطب التقليدي. له نكهة حارة مميزة وفوائد صحية عديدة.',
                'benefits_en' => '• Relieves nausea and vomiting
• Reduces inflammation
• Supports digestive health
• Boosts immune system
• Relieves pain
• Lowers blood sugar
• Improves heart health
• Aids in weight loss',
                'benefits_ar' => '• يخفف الغثيان والقيء
• يقلل الالتهابات
• يدعم صحة الجهاز الهضمي
• يعزز جهاز المناعة
• يخفف الألم
• يخفض سكر الدم
• يحسن صحة القلب
• يساعد في فقدان الوزن',
                'usage_en' => '• Brew as tea
• Add to cooking
• Use in smoothies
• Take as supplement
• Apply topically for pain relief',
                'usage_ar' => '• اصنع كشاي
• أضف إلى الطبخ
• استخدم في العصائر
• تناول كمكمل غذائي
• ضع موضعياً لتخفيف الألم',
                'image' => 'https://images.unsplash.com/photo-1596040033229-a9821ebd058d?w=500&h=500&fit=crop&bg=white',
                'category' => 'herbs',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name_en' => 'Turmeric',
                'name_ar' => 'الكركم',
                'slug' => 'turmeric',
                'description_en' => 'Turmeric is a bright yellow spice commonly used in Indian and Middle Eastern cuisine. Its active compound, curcumin, has powerful anti-inflammatory and antioxidant properties.',
                'description_ar' => 'الكركم هو توابل صفراء زاهرة تستخدم عادة في المطبخ الهندي والشرق أوسطي. مركبه النشط، الكركمين، له خصائص قوية مضادة للالتهابات ومضادات الأكسدة.',
                'benefits_en' => '• Powerful anti-inflammatory
• Rich in antioxidants
• Supports brain health
• Improves joint health
• Boosts immune system
• Aids in digestion
• May reduce risk of heart disease
• Supports skin health',
                'benefits_ar' => '• مضاد قوي للالتهابات
• غني بمضادات الأكسدة
• يدعم صحة الدماغ
• يحسن صحة المفاصل
• يعزز جهاز المناعة
• يساعد في الهضم
• قد يقلل خطر أمراض القلب
• يدعم صحة الجلد',
                'usage_en' => '• Add to curries and dishes
• Mix with warm milk (Golden Milk)
• Take as supplement
• Use in smoothies
• Apply as face mask',
                'usage_ar' => '• أضف إلى الكاري والأطباق
• امزج مع الحليب الدافئ (الحليب الذهبي)
• تناول كمكمل غذائي
• استخدم في العصائر
• ضع كقناع للوجه',
                'image' => 'https://images.unsplash.com/photo-1532336414038-cf19250c5757?w=500&h=500&fit=crop&bg=white',
                'category' => 'spices',
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'name_en' => 'Saffron',
                'name_ar' => 'الزعفران',
                'slug' => 'saffron',
                'description_en' => 'Saffron is one of the most expensive spices in the world, derived from the flower of Crocus sativus. It has a distinct flavor, aroma, and vibrant red color.',
                'description_ar' => 'الزعفران هو أحد أغلى التوابل في العالم، مستمد من زهرة الكركم. له نكهة ورائحة مميزة ولون أحمر زاهي.',
                'benefits_en' => '• Powerful antioxidant
• Improves mood and reduces depression
• Supports eye health
• Aids in weight loss
• Improves memory and cognitive function
• Reduces PMS symptoms
• Supports heart health
• Anti-aging properties',
                'benefits_ar' => '• مضاد أكسدة قوي
• يحسن المزاج ويقلل الاكتئاب
• يدعم صحة العين
• يساعد في فقدان الوزن
• يحسن الذاكرة والوظيفة الإدراكية
• يقلل أعراض الدورة الشهرية
• يدعم صحة القلب
• خصائص anti-aging',
                'usage_en' => '• Steep threads in warm liquid
• Add to rice dishes
• Use in desserts
• Brew as tea
• Add to warm milk',
                'usage_ar' => '• انقع الخيوط في السائل الدافئ
• أضف إلى أطباق الأرز
• استخدم في الحلويات
• اصنع كشاي
• أضف إلى الحليب الدافئ',
                'image' => 'https://images.unsplash.com/photo-1515586000433-45406d8e6662?w=500&h=500&fit=crop&bg=white',
                'category' => 'spices',
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'name_en' => 'Mint',
                'name_ar' => 'النعناع',
                'slug' => 'mint',
                'description_en' => 'Mint is a popular herb known for its refreshing aroma and cooling flavor. It has been used for centuries in cooking, medicine, and as a natural breath freshener.',
                'description_ar' => 'النعناع هو عشب شائع معروف برائعته المنعشة ونكهته المبردة. استخدم لقرون في الطبخ والطب وكمنعش للنفس طبيعي.',
                'benefits_en' => '• Soothes digestive issues
• Relieves headaches
• Freshens breath
• Reduces stress
• Supports respiratory health
• Improves focus
• Has antibacterial properties
• Cools the body',
                'benefits_ar' => '• يهدئ مشاكل الهضم
• يخفف الصداع
• ينعش النفس
• يقلل التوتر
• يدعم صحة الجهاز التنفسي
• يحسن التركيز
• له خصائص مضادة للبكتيريا
• يبرد الجسم',
                'usage_en' => '• Brew as tea
• Add to salads and dishes
• Chew fresh leaves
• Use in smoothies
• Apply as skin toner',
                'usage_ar' => '• اصنع كشاي
• أضف إلى السلطات والأطباق
• امضغ الأوراق الطازجة
• استخدم في العصائر
• ضع كتونر للبشرة',
                'image' => 'https://images.unsplash.com/photo-1509358271058-aedd22b89c91?w=500&h=500&fit=crop&bg=white',
                'category' => 'herbs',
                'is_active' => true,
                'sort_order' => 10,
            ],
            [
                'name_en' => 'Cardamom',
                'name_ar' => 'الهيل',
                'slug' => 'cardamom',
                'description_en' => 'Cardamom is a spice made from the seeds of several plants in the genera Elettaria and Amomum. It has a strong, unique flavor and is often called the "queen of spices".',
                'description_ar' => 'الهيل هو توابل مصنوعة من بذور عدة نباتات في جنس Elettaria و Amomum. له نكهة قوية وفريدة وغالباً ما يسمى "ملكة التوابل".',
                'benefits_en' => '• Improves digestion
• Freshens breath
• Supports respiratory health
• Has diuretic properties
• Regulates blood sugar
• Boosts metabolism
• Reduces inflammation
• Supports heart health',
                'benefits_ar' => '• يحسن الهضم
• ينعش النفس
• يدعم صحة الجهاز التنفسي
• له خصائص مدرية للبول
• ينظم سكر الدم
• يعزز التمثيل الغذائي
• يقلل الالتهابات
• يدعم صحة القلب',
                'usage_en' => '• Add to coffee or tea
• Use in baking
• Add to curries
• Chew seeds after meals
• Use in desserts',
                'usage_ar' => '• أضف إلى القهوة أو الشاي
• استخدم في الخبز
• أضف إلى الكاري
• امضغ البذور بعد الوجبات
• استخدم في الحلويات',
                'image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=500&h=500&fit=crop&bg=white',
                'category' => 'spices',
                'is_active' => true,
                'sort_order' => 11,
            ],
            [
                'name_en' => 'Frankincense Oil',
                'name_ar' => 'زيت اللبان',
                'slug' => 'frankincense-oil',
                'description_en' => 'Frankincense oil is derived from the resin of the Boswellia tree. It has been used for thousands of years in religious ceremonies and traditional medicine.',
                'description_ar' => 'زيت اللبان مشتق من راتنج شجرة البوسويليا. استخدم لآلاف السنين في المراسم الدينية والطب التقليدي.',
                'benefits_en' => '• Reduces inflammation
• Supports skin health
• Relieves stress and anxiety
• Improves respiratory function
• Boosts immune system
• Promotes better sleep
• Has anti-aging properties
• Supports joint health',
                'benefits_ar' => '• يقلل الالتهابات
• يدعم صحة الجلد
• يخفف التوتر والقلق
• يحسن وظيفة الجهاز التنفسي
• يعزز جهاز المناعة
• يعزز نوم أفضل
• له خصائص anti-aging
• يدعم صحة المفاصل',
                'usage_en' => '• Diffuse in aromatherapy
• Apply topically (diluted)
• Add to bath water
• Use in massage
• Add to skincare products',
                'usage_ar' => '• انتشر في العلاج بالروائح
• ضع موضعياً (مخفف)
• أضف إلى ماء الاستحمام
• استخدم في التدليك
• أضف إلى منتجات العناية بالبشرة',
                'image' => 'https://images.unsplash.com/photo-1596040033229-a9821ebd058d?w=500&h=500&fit=crop&bg=white',
                'category' => 'oils',
                'is_active' => true,
                'sort_order' => 12,
            ],
            [
                'name_en' => 'Black Seed Oil',
                'name_ar' => 'زيت حبة البركة',
                'slug' => 'black-seed-oil',
                'description_en' => 'Black seed oil is extracted from the seeds of Nigella sativa. It\'s rich in thymoquinone and has been used for centuries in traditional medicine across the Middle East and Asia.',
                'description_ar' => 'زيت حبة البركة مستخرج من بذور حبة البركة. هو غني بالثيموكينون واستخدم لقرون في الطب التقليدي عبر الشرق الأوسط وآسيا.',
                'benefits_en' => '• Boosts immune system
• Anti-inflammatory properties
• Supports respiratory health
• Improves skin conditions
• Promotes hair growth
• Regulates blood sugar
• Has antibacterial properties
• Supports heart health',
                'benefits_ar' => '• يعزز جهاز المناعة
• خصائص مضادة للالتهابات
• يدعم صحة الجهاز التنفسي
• يحسن حالات الجلد
• يعزز نمو الشعر
• ينظم سكر الدم
• له خصائص مضادة للبكتيريا
• يدعم صحة القلب',
                'usage_en' => '• Take 1 teaspoon daily
• Mix with honey
• Apply to skin
• Add to hair care routine
• Use in cooking',
                'usage_ar' => '• تناول ملعقة صغيرة يومياً
• امزج مع العسل
• ضع على الجلد
• أضف إلى روتين العناية بالشعر
• استخدم في الطبخ',
                'image' => 'https://images.unsplash.com/photo-1532336414038-cf19250c5757?w=500&h=500&fit=crop&bg=white',
                'category' => 'oils',
                'is_active' => true,
                'sort_order' => 13,
            ],
        ];

        foreach ($herbs as $herb) {
            Herb::create($herb);
        }
    }
}
