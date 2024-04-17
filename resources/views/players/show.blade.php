<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Sports Player Search</title>
      <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
      <div class="bg-white">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                  <div class="mx-auto max-w-2xl lg:mx-0">
                  </div>
                  <br>
                  <div class="">
                        <div class="sm:flex sm:items-center">
                              <div class="sm:flex-auto">
                                    <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                                          Player Name: {{ $player->name }}
                                    </h2>
                              </div>

                              <div class=" mt-4">

                              </div>
                        </div>

                        <div class="mt-8 flow-root">
                              <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                                <ul role="list" class="p-4 mx-auto mt-2 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                                                      <li>
                                                            <img class="" src="{{ $player->image_path }}" alt="">
                                                            <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">
                                                                  {{ $player->display_name }}
                                                            </h3>
                                                            <h3 class="font-semibold leading-8 tracking-tight text-gray-900">
                                                                  {{ $player->position_name }}
                                                            </h3>
                                                            <p class="text-base leading-7 text-gray-600">
                                                                  Age: {{ $player->age }}
                                                            </p>
                                                            <p class="text-base leading-7 text-gray-600">
                                                                  Gender: {{ $player->gender }}
                                                            </p>
                                                            <p class="text-base leading-7 text-gray-600">
                                                                  Playing Postion: {{ $player->position_name }}
                                                            </p>
                                                            <p class="text-base leading-7 text-gray-600">
                                                                  Nationality: {{ $player->nationality_name }}
                                                            </p>

                                                      </li>

                                                      <!-- More people... -->
                                                </ul>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

            </div>
      </div>
</body>

</html>