<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Panel</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item" onclick="showContent('services')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-list"></i><span>Список услуг</span></a>
            </li>
            <li class="nav-item" onclick="showContent('cars')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-car"></i><span>Автомобили для
                        тюнинга</span></a>
            </li>
            <li class="nav-item" onclick="showContent('clients-orders')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-users"></i><span>Заказы клиентов</span></a>
            </li>
            <li class="nav-item" onclick="showContent('clients-total')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-money-bill"></i><span>Суммы потраченные
                        клиентами</span></a>
            </li>
            <li class="nav-item" onclick="showContent('popular-services')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-chart-line"></i><span>Популярные
                        услуги</span></a>
            </li>
            <li class="nav-item" onclick="showContent('clients-by-service')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-user-tag"></i><span>Клиенты по
                        услуге</span></a>
            </li>
            <li class="nav-item" onclick="showContent('services-by-cost')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-dollar-sign"></i><span>Услуги выше
                        определенной стоимости</span></a>
            </li>
            <li class="nav-item" onclick="showContent('clients-by-car')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-user-friends"></i><span>Клиенты по
                        автомобилю</span></a>
            </li>
            <li class="nav-item" onclick="showContent('services-sorted')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-sort-amount-up"></i><span>Услуги,
                        отсортированные по стоимости</span></a>
            </li>
            <li class="nav-item" onclick="showContent('services-by-car')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-car-side"></i><span>Услуги по
                        автомобилю</span></a>
            </li>
            <li class="nav-item" onclick="showContent('add-service')">
                <a class="nav-link" href="#"><i class="fas fa-fw fa-concierge-bell"></i><span>Добавить
                        услугу</span></a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="services" class="content-section ml-5 mt-5" style="display: none;">
                <h4 class="mb-3">Список всех доступных услуг тюнингового центра:</h4>
                <ul id="servicesList" class="mt-5 list-unstyled">
                    @foreach ($services as $service)
                        <li class="mt-3">
                            <h5>{{ $service->name }}</h5>
                            <p>{{ $service->description }}</p>
                            <p>Цена: {{ $service->price }}</p>

                            <!-- Форма для удаления услуги -->
                            <form class="mt-1" action="{{ route('service.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                            <button type="button" class="btn btn-primary edit-button" data-toggle="modal"
                                data-target="#editModal" data-service-id="{{ $service->id }}"
                                data-service-name="{{ $service->name }}" data-service-price="{{ $service->price }}"
                                data-service-description="{{ $service->description }}">
                                Редактировать
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Редактировать услугу</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editForm" action="{{ url('/admin/update-service') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" id="editServiceId" name="service_id">
                                <div class="form-group">
                                    <label for="editServiceName">Название</label>
                                    <input type="text" class="form-control" id="editServiceName" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="editServicePrice">Цена</label>
                                    <input type="text" class="form-control" id="editServicePrice" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="editServiceDescription">Описание</label>
                                    <textarea class="form-control" id="editServiceDescription" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editServiceImage">Изображение</label>
                                    <input type="file" class="form-control-file" id="editServiceImage"
                                        name="image">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Кнопка для открытия модального окна редактирования услуги -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal"
                data-service-id="{{ $service->id }}" data-service-name="{{ $service->name }}"
                data-service-price="{{ $service->price }}" data-service-description="{{ $service->description }}">
                Редактировать
            </button>


            <div id="cars" class="content-section ml-5 mt-5" style="display: none;">
                <h4 class="mb-3">Список всех автомобилей, доступных для тюнинга:</h4>
                <ul class="mt-5 list-unstyled">
                    @foreach ($cars as $car)
                        <li>{{ $car->make }} {{ $car->model }}</li>
                    @endforeach
                </ul>
            </div>
            <div id="clients-orders" class="content-section ml-5 mt-5" style="display: none;">
                <h4 class="mb-3">Список клиентов, заказавших тюнинговые услуги:</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Имя клиента</th>
                            <th scope="col">Детали заказа</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @foreach ($user->orders as $order)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <strong>ID Заказа:</strong> {{ $order->id }}<br>
                                        <strong>Автомобиль:</strong> {{ optional($order->car)->make }}
                                        {{ optional($order->car)->model }}<br>
                                        <strong>Услуга:</strong> {{ optional($order->service)->name }}<br>
                                        <strong>Товар:</strong> {{ optional($order->product)->name }}<br>
                                        <strong>Итоговая стоимость:</strong> {{ $order->total_cost }}<br>
                                        <strong>Статус:</strong> {{ $order->status }}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div id="clients-total" class="content-section ml-5 mt-5" style="display: none;">
                <h4 class="mb-3">Список клиентов и общая сумма, которую они потратили на тюнинговые услуги:</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Имя клиента</th>
                            <th scope="col">Общая сумма</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->total_cost }}</td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>

            <div id="popular-services" class="content-section ml-5 mt-5" style="display: none;">
                <h4 class="mb-3">Список самых популярных услуг тюнингового центра:</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Название услуги</th>
                            <th>Количество заказов</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($popularServices as $service)
                            <tr>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->order_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="clients-by-service" class="content-section ml-5 mt-5" style="display: none;">
                <h4 class="mb-3">Список клиентов, у которых были сделаны заказы на определенную услугу:</h4>
                <select name="service_id" id="serviceSelect">
                    <option value="">Выберите услугу</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" @if (request()->input('service_id') == $service->id) selected @endif>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>

                <div id="clientsByServiceResult">
                    <p>Выберите услугу, чтобы увидеть клиентов.</p>
                </div>
            </div>

            <div id="services-by-cost" class="content-section ml-5 mt-5">
                <h4 class="mb-3">Список услуг тюнингового центра, стоимость которых превышает определенную сумму:
                </h4>

                <form action="{{ route('services-by-cost') }}" method="POST">
                    @csrf
                    <input type="number" name="cost" placeholder="Введите стоимость">
                    <button type="submit">Показать услуги</button>
                </form>

                @isset($servicesByCost)
                    <ul id="servicesList" class="list-unstyled">
                        @forelse($servicesByCost as $service)
                            <li>{{ $service->name }}</li>
                        @empty
                            <li>Нет услуг с заданной стоимостью</li>
                        @endforelse
                    </ul>
                @endisset
            </div>

            <div id="clients-by-car" class="content-section ml-5 mt-5" style="display: none;">
                <h4 class="mb-3">Список пользователей, у которых были сделаны заказы на тюнинг определенного
                    автомобиля:</h4>
                <form id="clientsByCarForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="carMake">Выберите автомобиль:</label>
                        <select name="car_make" id="carMake" class="form-control">
                            <option value="">Выберите автомобиль</option>
                            @foreach ($cars as $car)
                                <option value="{{ $car->make }}">{{ $car->make }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Показать клиентов</button>
                </form>

                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Имя пользователя</th>
                            <th scope="col">Автомобиль</th>
                            <th scope="col">Услуга</th> <!-- Добавленный столбец -->
                        </tr>
                    </thead>
                    <tbody id="clientsList">
                        @foreach ($users as $user)
                            @foreach ($user->orders as $order)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $order->car->make }} {{ $order->car->model }}</td>
                                    <td>{{ $order->service->name }}</td> <!-- Новая ячейка с услугой -->
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div id="services-sorted" class="content-section ml-5 mt-5" style="display: none;">
                <h4 class="mb-3">Список услуг тюнингового центра, отсортированный по стоимости услуги в порядке
                    возрастания:</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Название услуги</th>
                            <th>Стоимость</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div id="services-by-car" class="content-section ml-5 mt-5" style="display: none;">
                <h4 class="mb-3">Список услуг тюнингового центра, которые были выполнены на определенном автомобиле:
                </h4>

                <select name="car_id" id="carSelect">
                    <option value="">Выберите автомобиль</option>
                    <!-- Здесь должны быть элементы option с автомобилями -->
                </select>

                <ul id="servicesByCarList"></ul>
            </div>
            <div id="add-service" class="content-section ml-5 mt-5 ml-5 mt-5" style="display: none;">
                <h4 class="mb-3">Добавить услугу:</h4>
                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="serviceName">Название услуги</label>
                        <input type="text" class="form-control" id="serviceName" name="name"
                            placeholder="Введите название">
                    </div>
                    <div class="form-group">
                        <label for="serviceDescription">Описание услуги</label>
                        <textarea class="form-control" id="serviceDescription" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="servicePrice">Цена услуги</label>
                        <input type="number" class="form-control" id="servicePrice" name="price"
                            placeholder="Введите цену">
                    </div>
                    <div class="form-group">
                        <label for="serviceImage">Изображение услуги</label>
                        <input type="file" class="form-control" id="serviceImage" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js"></script>
    <script>
        const showContent = (sectionId) => {
            document.querySelectorAll('.content-section.ml-5.mt-5').forEach(section => section.style.display = 'none');
            document.getElementById(sectionId).style.display = 'block';
        };

        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const tab = urlParams.get('tab');

            if (tab === 'services') {
                showContent('services');
            }

            $('#serviceSelect').on('change', function() {
                const selectedServiceId = $(this).val();
                const clientsByServiceResult = $('#clientsByServiceResult');
                clientsByServiceResult.empty();

                $.ajax({
                    url: '{{ route('admin.getClientsByService') }}',
                    type: 'POST',
                    data: {
                        service_id: selectedServiceId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: (response) => {
                        if (response.length > 0) {
                            response.forEach(client => clientsByServiceResult.append(
                                `<p>${client.name} - ${client.service_name} - ${client.item_type}</p>`
                            ));
                        } else {
                            clientsByServiceResult.append(
                                '<p>Нет клиентов для выбранной услуги.</p>'
                            );
                        }
                    }
                });
            });

            $('#carSelect').on('change', function() {
                const selectedCarId = $(this).val();
                const servicesByCarList = $('#servicesByCarList');
                servicesByCarList.empty();

                $.ajax({
                    url: '{{ route('admin.getServicesByCar') }}',
                    type: 'POST',
                    data: {
                        car_id: selectedCarId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: (response) => {
                        if (response.length > 0) {
                            response.forEach(service => servicesByCarList.append(
                                `<li>${service.name}</li>`
                            ));
                        } else {
                            servicesByCarList.append(
                                '<li>Нет услуг для выбранного автомобиля.</li>'
                            );
                        }
                    }
                });
            });

            $('#clientsByCarForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('admin.clientsByCar') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: $(this).serialize(),
                    success: (data) => {
                        const clientsList = $('#clientsList');
                        clientsList.empty();

                        if (data.length > 0) {
                            data.forEach(user => {
                                user.orders.forEach(order => {
                                    const serviceName = order.service ? order
                                        .service.name : 'Нет данных';
                                    clientsList.append(
                                        `<tr><td>${user.name}</td><td>${order.car.make} ${order.car.model}</td><td>${serviceName}</td></tr>`
                                    );
                                });
                            });
                        } else {
                            clientsList.append('<tr><td colspan="3">Нет данных</td></tr>');
                        }
                    }
                });
            });

            $.ajax({
                url: '{{ route('admin.getAllCars') }}',
                type: 'GET',
                success: function(response) {
                    const carSelect = $('#carSelect');
                    response.forEach(function(car) {
                        carSelect.append(
                            `<option value="${car.id}">${car.make} ${car.model}</option>`
                        );
                    });
                }
            });

            function loadServicesSortedByCost() {
                $.ajax({
                    url: '{{ route('admin.getServicesSortedByCost') }}',
                    type: 'GET',
                    success: function(response) {
                        const servicesTableBody = $('#services-sorted tbody');
                        servicesTableBody.empty();

                        if (response.length > 0) {
                            response.forEach(function(service) {
                                servicesTableBody.append(
                                    `<tr><td>${service.name}</td><td>${service.price}</td></tr>`
                                );
                            });
                        } else {
                            servicesTableBody.append(
                                '<tr><td colspan="2">Нет данных об услугах.</td></tr>'
                            );
                        }
                    }
                });
            }

            loadServicesSortedByCost();
        });

        $(document).ready(function() {
            $('#editModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Кнопка, которая вызвала модальное окно
                var serviceId = button.data('service-id');
                var serviceName = button.data('service-name');
                var servicePrice = button.data('service-price');
                var serviceDescription = button.data('service-description');

                var modal = $(this);
                modal.find('#editServiceId').val(serviceId);
                modal.find('#editServiceName').val(serviceName);
                modal.find('#editServicePrice').val(servicePrice);
                modal.find('#editServiceDescription').val(serviceDescription);
            });

            $('#editForm').on('submit', function(e) {
                e.preventDefault();

                const form = $(this);
                const serviceId = form.find('#editServiceId').val();
                const serviceName = form.find('#editServiceName').val();
                const servicePrice = form.find('#editServicePrice').val();
                const serviceDescription = form.find('#editServiceDescription').val();
                const serviceImage = form.find('#editServiceImage').prop('files')[0];

                const formData = new FormData();
                formData.append('service_id', serviceId);
                formData.append('name', serviceName);
                formData.append('price', servicePrice);
                formData.append('description', serviceDescription);
                formData.append('image', serviceImage);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response.message);

                        updateServiceOnPage(response.service);
                    },
                    error: function(xhr, status, error) {
                        alert('Произошла ошибка при обновлении услуги');
                    }
                });
            });

            // Функция для обновления содержимого списка услуг на странице
            function updateServiceOnPage(service) {
                const serviceElement = $(`#servicesList li[data-service-id="${service.id}"]`);
                if (serviceElement.length > 0) {
                    serviceElement.find('.service-name').text(service.name);
                    serviceElement.find('.service-price').text(service.price);
                    serviceElement.find('.service-description').text(service.description);
                }
            }
        });
    </script>
</body>

</html>
