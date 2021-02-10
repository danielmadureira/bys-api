<?php

namespace Database\Factories;

use App\Models\UserMood;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class UserMoodFactory
 *
 * @package Database\Factories
 */
class UserMoodFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserMood::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 50),
            'emoji_hex' => $this->getRandomEmojiHex(),
            'description' => $this->faker->sentence
        ];
    }

    private function getRandomEmojiHex(): string
    {
        return $this->faker->randomElement([
            "U+1F004",
            "U+1F0CF",
            "U+1F170",
            "U+1F171",
            "U+1F17E",
            "U+1F17F",
            "U+1F18E",
            "U+1F191",
            "U+1F192",
            "U+1F193",
            "U+1F194",
            "U+1F195",
            "U+1F196",
            "U+1F197",
            "U+1F198",
            "U+1F199",
            "U+1F19A",
            "U+1F1E6",
            "U+1F1E7",
            "U+1F1E8-U+1F1F3",
            "U+1F1E8",
            "U+1F1E9-U+1F1EA",
            "U+1F1E9",
            "U+1F1EA-U+1F1F8",
            "U+1F1EA",
            "U+1F1EB-U+1F1F7",
            "U+1F1EB",
            "U+1F1EC-U+1F1E7",
            "U+1F1EC",
            "U+1F1ED",
            "U+1F1EE-U+1F1F9",
            "U+1F1EE",
            "U+1F1EF-U+1F1F5",
            "U+1F1EF",
            "U+1F1F0-U+1F1F7",
            "U+1F1F0",
            "U+1F1F1",
            "U+1F1F2",
            "U+1F1F3",
            "U+1F1F4",
            "U+1F1F5",
            "U+1F1F6",
            "U+1F1F7-U+1F1FA",
            "U+1F1F7",
            "U+1F1F8",
            "U+1F1F9",
            "U+1F1FA-U+1F1F8",
            "U+1F1FA",
            "U+1F1FB",
            "U+1F1FC",
            "U+1F1FD",
            "U+1F1FE",
            "U+1F1FF",
            "U+1F201",
            "U+1F202",
            "U+1F21A",
            "U+1F22F",
            "U+1F232",
            "U+1F233",
            "U+1F234",
            "U+1F235",
            "U+1F236",
            "U+1F237",
            "U+1F238",
            "U+1F239",
            "U+1F23A",
            "U+1F250",
            "U+1F251",
            "U+1F300",
            "U+1F301",
            "U+1F302",
            "U+1F303",
            "U+1F304",
            "U+1F305",
            "U+1F306",
            "U+1F307",
            "U+1F308",
            "U+1F309",
            "U+1F30A",
            "U+1F30B",
            "U+1F30C",
            "U+1F30D",
            "U+1F30E",
            "U+1F30F",
            "U+1F310",
            "U+1F311",
            "U+1F312",
            "U+1F313",
            "U+1F314",
            "U+1F315",
            "U+1F316",
            "U+1F317",
            "U+1F318",
            "U+1F319",
            "U+1F31A",
            "U+1F31B",
            "U+1F31C",
            "U+1F31D",
            "U+1F31E",
            "U+1F31F",
            "U+1F320",
            "U+1F330",
            "U+1F331",
            "U+1F332",
            "U+1F333",
            "U+1F334",
            "U+1F335",
            "U+1F337",
            "U+1F338",
            "U+1F339",
            "U+1F33A",
            "U+1F33B",
            "U+1F33C",
            "U+1F33D",
            "U+1F33E",
            "U+1F33F",
            "U+1F340",
            "U+1F341",
            "U+1F342",
            "U+1F343",
            "U+1F344",
            "U+1F345",
            "U+1F346",
            "U+1F347",
            "U+1F348",
            "U+1F349",
            "U+1F34A",
            "U+1F34B",
            "U+1F34C",
            "U+1F34D",
            "U+1F34E",
            "U+1F34F",
            "U+1F350",
            "U+1F351",
            "U+1F352",
            "U+1F353",
            "U+1F354",
            "U+1F355",
            "U+1F356",
            "U+1F357",
            "U+1F358",
            "U+1F359",
            "U+1F35A",
            "U+1F35B",
            "U+1F35C",
            "U+1F35D",
            "U+1F35E",
            "U+1F35F",
            "U+1F360",
            "U+1F361",
            "U+1F362",
            "U+1F363",
            "U+1F364",
            "U+1F365",
            "U+1F366",
            "U+1F367",
            "U+1F368",
            "U+1F369",
            "U+1F36A",
            "U+1F36B",
            "U+1F36C",
            "U+1F36D",
            "U+1F36E",
            "U+1F36F",
            "U+1F370",
            "U+1F371",
            "U+1F372",
            "U+1F373",
            "U+1F374",
            "U+1F375",
            "U+1F376",
            "U+1F377",
            "U+1F378",
            "U+1F379",
            "U+1F37A",
            "U+1F37B",
            "U+1F37C",
            "U+1F380",
            "U+1F381",
            "U+1F382",
            "U+1F383",
            "U+1F384",
            "U+1F385",
            "U+1F386",
            "U+1F387",
            "U+1F388",
            "U+1F389",
            "U+1F38A",
            "U+1F38B",
            "U+1F38C",
            "U+1F38D",
            "U+1F38E",
            "U+1F38F",
            "U+1F390",
            "U+1F391",
            "U+1F392",
            "U+1F393",
            "U+1F3A0",
            "U+1F3A1",
            "U+1F3A2",
            "U+1F3A3",
            "U+1F3A4",
            "U+1F3A5",
            "U+1F3A6",
            "U+1F3A7",
            "U+1F3A8",
            "U+1F3A9",
            "U+1F3AA",
            "U+1F3AB",
            "U+1F3AC",
            "U+1F3AD",
            "U+1F3AE",
            "U+1F3AF",
            "U+1F3B0",
            "U+1F3B1",
            "U+1F3B2",
            "U+1F3B3",
            "U+1F3B4",
            "U+1F3B5",
            "U+1F3B6",
            "U+1F3B7",
            "U+1F3B8",
            "U+1F3B9",
            "U+1F3BA",
            "U+1F3BB",
            "U+1F3BC",
            "U+1F3BD",
            "U+1F3BE",
            "U+1F3BF",
            "U+1F3C0",
            "U+1F3C1",
            "U+1F3C2",
            "U+1F3C3",
            "U+1F3C4",
            "U+1F3C6",
            "U+1F3C7",
            "U+1F3C8",
            "U+1F3C9",
            "U+1F3CA",
            "U+1F3E0",
            "U+1F3E1",
            "U+1F3E2",
            "U+1F3E3",
            "U+1F3E4",
            "U+1F3E5",
            "U+1F3E6",
            "U+1F3E7",
            "U+1F3E8",
            "U+1F3E9",
            "U+1F3EA",
            "U+1F3EB",
            "U+1F3EC",
            "U+1F3ED",
            "U+1F3EE",
            "U+1F3EF",
            "U+1F3F0",
            "U+1F400",
            "U+1F401",
            "U+1F402",
            "U+1F403",
            "U+1F404",
            "U+1F405",
            "U+1F406",
            "U+1F407",
            "U+1F408",
            "U+1F409",
            "U+1F40A",
            "U+1F40B",
            "U+1F40C",
            "U+1F40D",
            "U+1F40E",
            "U+1F40F",
            "U+1F410",
            "U+1F411",
            "U+1F412",
            "U+1F413",
            "U+1F414",
            "U+1F415",
            "U+1F416",
            "U+1F417",
            "U+1F418",
            "U+1F419",
            "U+1F41A",
            "U+1F41B",
            "U+1F41C",
            "U+1F41D",
            "U+1F41E",
            "U+1F41F",
            "U+1F420",
            "U+1F421",
            "U+1F422",
            "U+1F423",
            "U+1F424",
            "U+1F425",
            "U+1F426",
            "U+1F427",
            "U+1F428",
            "U+1F429",
            "U+1F42A",
            "U+1F42B",
            "U+1F42C",
            "U+1F42D",
            "U+1F42E",
            "U+1F42F",
            "U+1F430",
            "U+1F431",
            "U+1F432",
            "U+1F433",
            "U+1F434",
            "U+1F435",
            "U+1F436",
            "U+1F437",
            "U+1F438",
            "U+1F439",
            "U+1F43A",
            "U+1F43B",
            "U+1F43C",
            "U+1F43D",
            "U+1F43E",
            "U+1F440",
            "U+1F442",
            "U+1F443",
            "U+1F444",
            "U+1F445",
            "U+1F446",
            "U+1F447",
            "U+1F448",
            "U+1F449",
            "U+1F44A",
            "U+1F44B",
            "U+1F44C",
            "U+1F44D",
            "U+1F44E",
            "U+1F44F",
            "U+1F450",
            "U+1F451",
            "U+1F452",
            "U+1F453",
            "U+1F454",
            "U+1F455",
            "U+1F456",
            "U+1F457",
            "U+1F458",
            "U+1F459",
            "U+1F45A",
            "U+1F45B",
            "U+1F45C",
            "U+1F45D",
            "U+1F45E",
            "U+1F45F",
            "U+1F460",
            "U+1F461",
            "U+1F462",
            "U+1F463",
            "U+1F464",
            "U+1F465",
            "U+1F466",
            "U+1F467",
            "U+1F468",
            "U+1F469",
            "U+1F46A",
            "U+1F46B",
            "U+1F46C",
            "U+1F46D",
            "U+1F46E",
            "U+1F46F",
            "U+1F470",
            "U+1F471",
            "U+1F472",
            "U+1F473",
            "U+1F474",
            "U+1F475",
            "U+1F476",
            "U+1F477",
            "U+1F478",
            "U+1F479",
            "U+1F47A",
            "U+1F47B",
            "U+1F47C",
            "U+1F47D",
            "U+1F47E",
            "U+1F47F",
            "U+1F480",
            "U+1F481",
            "U+1F482",
            "U+1F483",
            "U+1F484",
            "U+1F485",
            "U+1F486",
            "U+1F487",
            "U+1F488",
            "U+1F489",
            "U+1F48A",
            "U+1F48B",
            "U+1F48C",
            "U+1F48D",
            "U+1F48E",
            "U+1F48F",
            "U+1F490",
            "U+1F491",
            "U+1F492",
            "U+1F493",
            "U+1F494",
            "U+1F495",
            "U+1F496",
            "U+1F497",
            "U+1F498",
            "U+1F499",
            "U+1F49A",
            "U+1F49B",
            "U+1F49C",
            "U+1F49D",
            "U+1F49E",
            "U+1F49F",
            "U+1F4A0",
            "U+1F4A1",
            "U+1F4A2",
            "U+1F4A3",
            "U+1F4A4",
            "U+1F4A5",
            "U+1F4A6",
            "U+1F4A7",
            "U+1F4A8",
            "U+1F4A9",
            "U+1F4AA",
            "U+1F4AB",
            "U+1F4AC",
            "U+1F4AD",
            "U+1F4AE",
            "U+1F4AF",
            "U+1F4B0",
            "U+1F4B1",
            "U+1F4B2",
            "U+1F4B3",
            "U+1F4B4",
            "U+1F4B5",
            "U+1F4B6",
            "U+1F4B7",
            "U+1F4B8",
            "U+1F4B9",
            "U+1F4BA",
            "U+1F4BB",
            "U+1F4BC",
            "U+1F4BD",
            "U+1F4BE",
            "U+1F4BF",
            "U+1F4C0",
            "U+1F4C1",
            "U+1F4C2",
            "U+1F4C3",
            "U+1F4C4",
            "U+1F4C5",
            "U+1F4C6",
            "U+1F4C7",
            "U+1F4C8",
            "U+1F4C9",
            "U+1F4CA",
            "U+1F4CB",
            "U+1F4CC",
            "U+1F4CD",
            "U+1F4CE",
            "U+1F4CF",
            "U+1F4D0",
            "U+1F4D1",
            "U+1F4D2",
            "U+1F4D3",
            "U+1F4D4",
            "U+1F4D5",
            "U+1F4D6",
            "U+1F4D7",
            "U+1F4D8",
            "U+1F4D9",
            "U+1F4DA",
            "U+1F4DB",
            "U+1F4DC",
            "U+1F4DD",
            "U+1F4DE",
            "U+1F4DF",
            "U+1F4E0",
            "U+1F4E1",
            "U+1F4E2",
            "U+1F4E3",
            "U+1F4E4",
            "U+1F4E5",
            "U+1F4E6",
            "U+1F4E7",
            "U+1F4E8",
            "U+1F4E9",
            "U+1F4EA",
            "U+1F4EB",
            "U+1F4EC",
            "U+1F4ED",
            "U+1F4EE",
            "U+1F4EF",
            "U+1F4F0",
            "U+1F4F1",
            "U+1F4F2",
            "U+1F4F3",
            "U+1F4F4",
            "U+1F4F5",
            "U+1F4F6",
            "U+1F4F7",
            "U+1F4F9",
            "U+1F4FA",
            "U+1F4FB",
            "U+1F4FC",
            "U+1F500",
            "U+1F501",
            "U+1F502",
            "U+1F503",
            "U+1F504",
            "U+1F505",
            "U+1F506",
            "U+1F507",
            "U+1F508",
            "U+1F509",
            "U+1F50A",
            "U+1F50B",
            "U+1F50C",
            "U+1F50D",
            "U+1F50E",
            "U+1F50F",
            "U+1F510",
            "U+1F511",
            "U+1F512",
            "U+1F513",
            "U+1F514",
            "U+1F515",
            "U+1F516",
            "U+1F517",
            "U+1F518",
            "U+1F519",
            "U+1F51A",
            "U+1F51B",
            "U+1F51C",
            "U+1F51D",
            "U+1F51E",
            "U+1F51F",
            "U+1F520",
            "U+1F521",
            "U+1F522",
            "U+1F523",
            "U+1F524",
            "U+1F525",
            "U+1F526",
            "U+1F527",
            "U+1F528",
            "U+1F529",
            "U+1F52A",
            "U+1F52B",
            "U+1F52C",
            "U+1F52D",
            "U+1F52E",
            "U+1F52F",
            "U+1F530",
            "U+1F531",
            "U+1F532",
            "U+1F533",
            "U+1F534",
            "U+1F535",
            "U+1F536",
            "U+1F537",
            "U+1F538",
            "U+1F539",
            "U+1F53A",
            "U+1F53B",
            "U+1F53C",
            "U+1F53D",
            "U+1F550",
            "U+1F551",
            "U+1F552",
            "U+1F553",
            "U+1F554",
            "U+1F555",
            "U+1F556",
            "U+1F557",
            "U+1F558",
            "U+1F559",
            "U+1F55A",
            "U+1F55B",
            "U+1F55C",
            "U+1F55D",
            "U+1F55E",
            "U+1F55F",
            "U+1F560",
            "U+1F561",
            "U+1F562",
            "U+1F563",
            "U+1F564",
            "U+1F565",
            "U+1F566",
            "U+1F567",
            "U+1F5FB",
            "U+1F5FC",
            "U+1F5FD",
            "U+1F5FE",
            "U+1F5FF",
            "U+1F600",
            "U+1F601",
            "U+1F602",
            "U+1F603",
            "U+1F604",
            "U+1F605",
            "U+1F606",
            "U+1F607",
            "U+1F608",
            "U+1F609",
            "U+1F60A",
            "U+1F60B",
            "U+1F60C",
            "U+1F60D",
            "U+1F60E",
            "U+1F60F",
            "U+1F610",
            "U+1F611",
            "U+1F612",
            "U+1F613",
            "U+1F614",
            "U+1F615",
            "U+1F616",
            "U+1F617",
            "U+1F618",
            "U+1F619",
            "U+1F61A",
            "U+1F61B",
            "U+1F61C",
            "U+1F61D",
            "U+1F61E",
            "U+1F61F",
            "U+1F620",
            "U+1F621",
            "U+1F622",
            "U+1F623",
            "U+1F624",
            "U+1F625",
            "U+1F626",
            "U+1F627",
            "U+1F628",
            "U+1F629",
            "U+1F62A",
            "U+1F62B",
            "U+1F62C",
            "U+1F62D",
            "U+1F62E",
            "U+1F62F",
            "U+1F630",
            "U+1F631",
            "U+1F632",
            "U+1F633",
            "U+1F634",
            "U+1F635",
            "U+1F636",
            "U+1F637",
            "U+1F638",
            "U+1F639",
            "U+1F63A",
            "U+1F63B",
            "U+1F63C",
            "U+1F63D",
            "U+1F63E",
            "U+1F63F",
            "U+1F640",
            "U+1F641",
            "U+1F642",
            "U+1F645",
            "U+1F646",
            "U+1F647",
            "U+1F648",
            "U+1F649",
            "U+1F64A",
            "U+1F64B",
            "U+1F64C",
            "U+1F64D",
            "U+1F64E",
            "U+1F64F",
            "U+1F680",
            "U+1F681",
            "U+1F682",
            "U+1F683",
            "U+1F684",
            "U+1F685",
            "U+1F686",
            "U+1F687",
            "U+1F688",
            "U+1F689",
            "U+1F68A",
            "U+1F68B",
            "U+1F68C",
            "U+1F68D",
            "U+1F68E",
            "U+1F68F",
            "U+1F690",
            "U+1F691",
            "U+1F692",
            "U+1F693",
            "U+1F694",
            "U+1F695",
            "U+1F696",
            "U+1F697",
            "U+1F698",
            "U+1F699",
            "U+1F69A",
            "U+1F69B",
            "U+1F69C",
            "U+1F69D",
            "U+1F69E",
            "U+1F69F",
            "U+1F6A0",
            "U+1F6A1",
            "U+1F6A2",
            "U+1F6A3",
            "U+1F6A4",
            "U+1F6A5",
            "U+1F6A6",
            "U+1F6A7",
            "U+1F6A8",
            "U+1F6A9",
            "U+1F6AA",
            "U+1F6AB",
            "U+1F6AC",
            "U+1F6AD",
            "U+1F6AE",
            "U+1F6AF",
            "U+1F6B0",
            "U+1F6B1",
            "U+1F6B2",
            "U+1F6B3",
            "U+1F6B4",
            "U+1F6B5",
            "U+1F6B6",
            "U+1F6B7",
            "U+1F6B8",
            "U+1F6B9",
            "U+1F6BA",
            "U+1F6BB",
            "U+1F6BC",
            "U+1F6BD",
            "U+1F6BE",
            "U+1F6BF",
            "U+1F6C0",
            "U+1F6C1",
            "U+1F6C2",
            "U+1F6C3",
            "U+1F6C4",
            "U+1F6C5",
            "U+203C",
            "U+2049",
            "U+2122",
            "U+2139",
            "U+2194",
            "U+2195",
            "U+2196",
            "U+2197",
            "U+2198",
            "U+2199",
            "U+21A9",
            "U+21AA",
            "U+23-U+20E3",
            "U+231A",
            "U+231B",
            "U+23E9",
            "U+23EA",
            "U+23EB",
            "U+23EC",
            "U+23F0",
            "U+23F3",
            "U+24C2",
            "U+25AA",
            "U+25AB",
            "U+25B6",
            "U+25C0",
            "U+25FB",
            "U+25FC",
            "U+25FD",
            "U+25FE",
            "U+2600",
            "U+2601",
            "U+260E",
            "U+2611",
            "U+2614",
            "U+2615",
            "U+261D",
            "U+263A",
            "U+2648",
            "U+2649",
            "U+264A",
            "U+264B",
            "U+264C",
            "U+264D",
            "U+264E",
            "U+264F",
            "U+2650",
            "U+2651",
            "U+2652",
            "U+2653",
            "U+2660",
            "U+2663",
            "U+2665",
            "U+2666",
            "U+2668",
            "U+267B",
            "U+267F",
            "U+2693",
            "U+26A0",
            "U+26A1",
            "U+26AA",
            "U+26AB",
            "U+26BD",
            "U+26BE",
            "U+26C4",
            "U+26C5",
            "U+26CE",
            "U+26D4",
            "U+26EA",
            "U+26F2",
            "U+26F3",
            "U+26F5",
            "U+26FA",
            "U+26FD",
            "U+2702",
            "U+2705",
            "U+2708",
            "U+2709",
            "U+270A",
            "U+270B",
            "U+270C",
            "U+270F",
            "U+2712",
            "U+2714",
            "U+2716",
            "U+2728",
            "U+2733",
            "U+2734",
            "U+2744",
            "U+2747",
            "U+274C",
            "U+274E",
            "U+2753",
            "U+2754",
            "U+2755",
            "U+2757",
            "U+2764",
            "U+2795",
            "U+2796",
            "U+2797",
            "U+27A1",
            "U+27B0",
            "U+27BF",
            "U+2934",
            "U+2935",
            "U+2B05",
            "U+2B06",
            "U+2B07",
            "U+2B1B",
            "U+2B1C",
            "U+2B50",
            "U+2B55",
            "U+30-U+20E3",
            "U+3030",
            "U+303D",
            "U+31-U+20E3",
            "U+32-U+20E3",
            "U+3297",
            "U+3299",
            "U+33-U+20E3",
            "U+34-U+20E3",
            "U+35-U+20E3",
            "U+36-U+20E3",
            "U+37-U+20E3",
            "U+38-U+20E3",
            "U+39-U+20E3",
            "U+A9",
            "U+AE",
            "U+E50A"
        ]);
    }
}
