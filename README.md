# TopicGrow WordPress Theme

the-edit.co.kr 스타일을 참고해 만든 topicgrow.co.kr용 워드프레스 테마.

## 배포 방식

이 저장소는 Hostinger hPanel의 **Git 배포 기능**과 연결되어 있습니다.
`main` 브랜치에 push하면 서버의 `wp-content/themes/topicgrow-theme/` 경로로 자동 반영됩니다.

## 로컬 개발

1. 이 폴더를 수정
2. `git add . && git commit -m "메시지"`
3. `git push`
4. Hostinger hPanel에서 자동/수동 배포 확인
5. 워드프레스 관리자(외모 > 테마)에서 "TopicGrow" 테마 활성화 (최초 1회)

## 파일 구조

- `style.css` — 테마 정보 + 전체 CSS (컬러 토큰, 헤더/히어로/카드그리드/푸터)
- `functions.php` — 테마 지원 기능, 폰트/스타일 로드, 메뉴 등록
- `header.php` / `footer.php` — 공통 헤더/푸터
- `index.php` — 홈/글목록 (히어로 1건 + 카드 그리드)
- `single.php` — 개별 글 페이지
- `page.php` — 고정 페이지
