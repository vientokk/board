<?php
$js_array = ['./js/member.js'];
$g_title = "약관";
include './inc_header.php'
?>

<main class="p-5 border round-5">
    <h1 class="text-center">회원 약관 및 개인정보 취급방침 동의</h1>
    <h4>회원 약관</h4>
    <textarea name="" id="" cols="30" rows="10" class="form-control">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias natus nostrum, architecto officia maiores iste odio veritatis ipsam sint dicta corrupti fugiat. Consectetur veniam, dignissimos laboriosam asperiores atque voluptatum velit maiores veritatis. Animi ipsum distinctio itaque ea iste eligendi autem expedita porro excepturi, eos similique cum accusantium cumque dolores sit alias natus tenetur incidunt, eum amet! Harum accusantium hic temporibus reiciendis in nostrum doloremque, mollitia eveniet excepturi eum! Inventore autem modi nam, pariatur doloremque animi nihil aliquam a delectus? Eos, impedit. Libero at, corrupti tenetur, ducimus laboriosam molestias id sit maiores molestiae possimus quaerat sequi perspiciatis. Laborum quod a, autem sequi beatae facere distinctio aperiam impedit voluptas, libero nobis sunt sed ea veniam eum, eius quae? Dolorum velit sapiente harum cumque. Assumenda cupiditate minima beatae incidunt corrupti adipisci laborum explicabo obcaecati. Vel blanditiis deserunt quasi sunt dolorum nesciunt quidem eveniet dolore, voluptas doloremque alias animi nemo nulla, voluptatibus tenetur eos culpa corrupti et velit fugiat rem sint eaque. Corporis, odio ipsum maiores magnam facilis cupiditate. Amet commodi autem ducimus, iure ullam, maxime voluptatum voluptatem dignissimos corporis sequi aliquam ad ea accusantium pariatur laborum aperiam sunt inventore possimus quibusdam libero facere, omnis fugiat eligendi incidunt? Obcaecati, accusamus laudantium! Porro eveniet et nobis nam, veniam, fuga qui cupiditate vitae consequatur rem ut placeat incidunt veritatis deleniti cumque beatae molestiae laborum voluptatum. Molestiae, minima? Ex cupiditate ut beatae temporibus! Perferendis voluptatem necessitatibus, neque laudantium expedita temporibus accusantium nemo quae velit autem illum accusamus, magnam numquam qui nulla suscipit voluptates consequatur possimus. Aliquam libero earum quisquam mollitia porro deserunt. Fuga, deleniti aut! Natus facere repudiandae non ut ab sapiente eligendi commodi? Fugiat necessitatibus veniam sit recusandae ipsam, dolore doloribus dolorum nesciunt corrupti quo veritatis quasi ad reiciendis magni reprehenderit blanditiis consequuntur animi commodi in ex. Facilis vero consequatur harum laudantium, dolores placeat voluptatum sapiente.
            </textarea>
    <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" value="" id="chk_member1">
        <label class="form-check-label" for="chk_member1">
            위 약관에 동의하시겠습니까?
        </label>
    </div>

    <h4 class="mt-3">개인정보 취급방침</h4>
    <textarea name="" id="" cols="30" rows="10" class="form-control">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate eaque reiciendis fugiat ipsam pariatur similique, explicabo vitae quisquam impedit voluptates quam eveniet quos doloremque! Ducimus mollitia beatae exercitationem nihil dolorum sunt nisi fuga earum recusandae sapiente, magni cumque ullam facere laboriosam veritatis tempora amet quae aperiam quibusdam nam fugit nemo esse necessitatibus. Beatae excepturi voluptatum, autem quibusdam dolorem, est minima esse at doloribus dolor quia, quasi consequatur tenetur quidem unde atque ex rerum enim tempora. Debitis commodi impedit officia placeat. Numquam dolor possimus id magnam consequatur repudiandae cumque quae aut, minus maxime modi quisquam cupiditate obcaecati tempore explicabo, voluptate asperiores atque a ducimus sit mollitia. Itaque earum illo deserunt consectetur nostrum, impedit eaque suscipit corrupti, perferendis ut labore! Eaque qui architecto sapiente unde sed libero accusantium officiis expedita dignissimos recusandae eligendi, nostrum ea quibusdam eius. Inventore aspernatur nesciunt totam repellendus reprehenderit qui optio culpa eius quasi, velit ipsum quisquam vero animi assumenda a aliquam neque perferendis. Perspiciatis ratione officia dolor minus, fugit ipsam nesciunt suscipit explicabo omnis debitis ab ad ducimus non cum provident sed unde nam, nobis at fugiat! Consectetur cum quis saepe distinctio architecto quas consequatur aut. Ab non accusamus ipsa sequi nihil fuga sunt itaque illo, veritatis enim voluptate deserunt maxime commodi facilis consequatur! Voluptates corporis fugiat qui corrupti accusamus, sint facilis, vero minima eos aliquid ratione eius rem doloremque adipisci impedit asperiores numquam architecto? Sit ab earum voluptates vel quae quaerat et, delectus voluptatem laborum! Odit quia dolorem, quisquam corrupti necessitatibus iure quibusdam repellendus quasi error, totam ipsa. Ipsum, cupiditate? Architecto, saepe maiores asperiores cum exercitationem magni doloribus officiis optio iusto dolorum porro culpa quisquam nostrum esse accusamus eum fugit omnis impedit in! Eius ipsa officia quasi iusto quas maxime aliquam fugiat sed? Necessitatibus aspernatur minus, nam voluptates assumenda minima quisquam illum? Quos sapiente nam eum?
            </textarea>
    <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" value="" id="chk_member2">
        <label class="form-check-label" for="chk_member2">
            위 개인정보 취급방침에 동의하시겠습니까?
        </label>
    </div>

    <div class="mt-4 d-flex justify-content-center gap-2">
        <button class="btn btn-primary w-50" id="btn-member">회원가입</button>
        <button class="btn btn-secondary w-50">가입취소</button>
    </div>

    <form action="./member_input.php" method="post" name="stipulation_form" style="display:none;">
        <input type="hidden" name="chk" value="0">
    </form>

</main>


<?php include './inc_footer.php' ?>